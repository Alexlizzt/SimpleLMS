<?php

namespace Drupal\lms_progress\Controller;

use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\lms_progress\Service\ProgressService;

class ProgressController extends ControllerBase {

  protected $progressService;

  public function __construct(ProgressService $progressService) {
    $this->progressService = $progressService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('lms_progress.progress_service')
    );
  }

  public function complete($lesson = NULL) {
    if (!$lesson || !is_numeric($lesson)) {
      throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
    }

    $user = $this->currentUser();

    $this->progressService->markLessonComplete(
      $user->id(),
      $lesson
    );

    $node = Node::load($lesson);
    if ($node) {
      return new RedirectResponse($node->toUrl()->toString());
    }
    return $this->redirect('<front>');
  }

  public function enroll($course = NULL) {

    if (!$course) {
      throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
    }

    $user = $this->currentUser();

    $this->progressService->enrollUser(
      $user->id(),
      $course
    );

    $node = Node::load($course);

    return new RedirectResponse($node->toUrl()->toString());
  }

}
