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

}
