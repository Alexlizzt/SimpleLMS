<?php

namespace Drupal\lms_progress\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\Entity\Node;

class LessonAccessCheck implements AccessInterface {

  public function access(Route $route, Request $request, AccountInterface $account) {

    $node = \Drupal::routeMatch()->getParameter('node');

    if (!$node instanceof Node) {
      return AccessResult::neutral();
    }

    // Solo aplicar a lecciones
    if ($node->bundle() !== 'leccion') {
      return AccessResult::neutral();
    }

    $course = $node->get('field_curso_padre')->target_id;

    $progress_service = \Drupal::service('lms_progress.progress_service');

    $enrolled = $progress_service->isUserEnrolled(
      $account->id(),
      $course
    );

    return $enrolled
      ? AccessResult::allowed()
      : AccessResult::forbidden();

  }

}
