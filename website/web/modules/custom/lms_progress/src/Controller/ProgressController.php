<?php

namespace Drupal\lms_progress\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\node\Entity\Node;

class ProgressController extends ControllerBase {

  public function completeLesson($lesson) {

    $user = $this->currentUser();

    $node = Node::load($lesson);

    if (!$node) {
      return new RedirectResponse('/');
    }

    $progress = \Drupal\node\Entity\Node::create([
      'type' => 'lesson_progress',
      'title' => 'Progreso ' . $user->id() . ' - ' . $lesson,
      'field_user' => $user->id(),
      'field_lesson' => $lesson,
      'field_completed' => 1,
    ]);

    $progress->save();

    $this->messenger()->addMessage('Lección marcada como completada.');

    return new RedirectResponse($node->toUrl()->toString());

  }

}
