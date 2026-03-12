<?php

namespace Drupal\lms_progress\Service;

use Drupal\Core\Database\Connection;

class ProgressService {

  protected $database;

  public function __construct(Connection $database) {
    $this->database = $database;
  }

  public function markLessonComplete($user_id, $lesson_id) {
    $exists = $this->database->select('lms_lesson_progress', 'p')
      ->fields('p', ['id'])
      ->condition('user_id', $user_id)
      ->condition('lesson_id', $lesson_id)
      ->execute()
      ->fetchField();

    if (!$exists) {

      $this->database->insert('lms_lesson_progress')
        ->fields([
          'user_id' => $user_id,
          'lesson_id' => $lesson_id,
          'completed' => 1,
          'created' => time(),
        ])
        ->execute();
    }
  }

  public function isLessonCompleted($user_id, $lesson_id) {
    $result = $this->database->select('lms_lesson_progress', 'p')
      ->fields('p', ['id'])
      ->condition('user_id', $user_id)
      ->condition('lesson_id', $lesson_id)
      ->execute()
      ->fetchField();

    return (bool) $result;
  }

  public function getCourseProgress($user_id, $course_id) {

    $database = $this->database;

    // Obtener lecciones del curso
    $lesson_ids = $database->select('node__field_curso_padre', 'f')
      ->fields('f', ['entity_id'])
      ->condition('f.field_curso_padre_target_id', $course_id)
      ->execute()
      ->fetchCol();

    if (empty($lesson_ids)) {
      return 0;
    }

    // Lecciones completadas
    $completed = $database->select('lms_lesson_progress', 'p')
      ->condition('user_id', $user_id)
      ->condition('lesson_id', $lesson_ids, 'IN')
      ->countQuery()
      ->execute()
      ->fetchField();

    $total = count($lesson_ids);

    if ($total == 0) {
      return 0;
    }

    return round(($completed / $total) * 100);
  }

  // Inscribir usuario en curso
  public function enrollUser($user_id, $course_id) {

    $exists = $this->database->select('lms_course_enrollment', 'e')
      ->fields('e', ['id'])
      ->condition('user_id', $user_id)
      ->condition('course_id', $course_id)
      ->execute()
      ->fetchField();

    if (!$exists) {

      $this->database->insert('lms_course_enrollment')
        ->fields([
          'user_id' => $user_id,
          'course_id' => $course_id,
          'created' => time(),
        ])
        ->execute();

    }
  }

  // Verificar si usuario está inscrito en curso
  public function isUserEnrolled($user_id, $course_id) {
    $result = $this->database->select('lms_course_enrollment', 'e')
      ->fields('e', ['id'])
      ->condition('user_id', $user_id)
      ->condition('course_id', $course_id)
      ->execute()
      ->fetchField();

    return (bool) $result;

  }

  public function getNextLesson($user_id, $course_id) {
    // La primera lección del curso que NO esté en la tabla de progreso del usuario
    $query = $this->database->select('node__field_curso_padre', 'f');
    $query->join('node_field_data', 'n', 'n.nid = f.entity_id'); // Para poder ordenar por creación o título si prefieres
    $query->leftJoin('lms_lesson_progress', 'p', 'p.lesson_id = f.entity_id AND p.user_id = :uid', [':uid' => $user_id]);

    $next_lesson = $query->fields('f', ['entity_id'])
      ->condition('f.field_curso_padre_target_id', $course_id)
      ->condition('p.lesson_id', NULL, 'IS NULL') // Filtra las que NO tienen registro de completado
      ->orderBy('f.entity_id', 'ASC') // O un campo 'field_peso' si lo tienes
      ->range(0, 1) // Solo queremos la primera
      ->execute()
      ->fetchField();

    if ($next_lesson) {
      return $next_lesson;
    }

    // Si no encontró ninguna (todas completadas), devolvemos la última lección del curso
    return $this->database->select('node__field_curso_padre', 'f')
      ->fields('f', ['entity_id'])
      ->condition('f.field_curso_padre_target_id', $course_id)
      ->orderBy('f.entity_id', 'DESC')
      ->range(0, 1)
      ->execute()
      ->fetchField();
  }

  // Verifica si el curso está completo (todas las lecciones completadas)
  public function isCourseComplete($user_id, $course_id) {
  $lesson_ids = $this->database->select('node__field_curso_padre', 'f')
    ->fields('f', ['entity_id'])
    ->condition('f.field_curso_padre_target_id', $course_id)
    ->execute()
    ->fetchCol();

  if (empty($lesson_ids)) return FALSE;

  $completed_count = $this->database->select('lms_lesson_progress', 'p')
    ->condition('user_id', $user_id)
    ->condition('lesson_id', $lesson_ids, 'IN')
    ->countQuery()
    ->execute()
    ->fetchField();

  return count($lesson_ids) === (int) $completed_count;
}
}
