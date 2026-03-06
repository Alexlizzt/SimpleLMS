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

}
