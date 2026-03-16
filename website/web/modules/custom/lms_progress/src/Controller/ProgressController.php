<?php

namespace Drupal\lms_progress\Controller;

use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\lms_progress\Service\ProgressService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Drupal\Core\Session\AccountInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;

class ProgressController extends ControllerBase {

  protected $progressService;
  protected $currentUser;

  /**
   * Constructor con Inyección de Dependencias.
   */
  public function __construct(ProgressService $progressService, AccountInterface $currentUser) {
    $this->progressService = $progressService;
    $this->currentUser = $currentUser;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('lms_progress.progress_service'),
      $container->get('current_user')
    );
  }

  /**
   * Marca lección como completa y salta a la siguiente.
   */
  public function complete($lesson = NULL) {
    $uid = $this->currentUser->id();

    // 1. Validación de seguridad básica
    if ($uid == 0) {
      throw new AccessDeniedHttpException('Debes iniciar sesión para registrar progreso.');
    }

    $node = Node::load($lesson);
    if (!$node || $node->bundle() !== 'leccion') { // Ajusta 'leccion' al ID de tu tipo de contenido
      throw new NotFoundHttpException();
    }

    // 2. Registrar progreso
    $this->progressService->markLessonComplete($uid, $lesson);
    $this->messenger()->addStatus($this->t('¡Lección completada!'));

    // 3. Lógica de redirección inteligente:
    // Buscamos el curso padre para saber a qué lección seguir.
    if ($node->hasField('field_curso_padre') && !$node->get('field_curso_padre')->isEmpty()) {
      $course_id = $node->get('field_curso_padre')->target_id;
      // Reutilizamos la lógica de continueCourse
      return $this->redirect('lms_progress.continue_course', ['course' => $course_id]);
    }

    return $this->redirect('entity.node.canonical', ['node' => $lesson]);
  }

  /**
   * Inscribe al usuario y lo manda a la primera lección.
   */
  public function enroll($course = NULL) {
    $uid = $this->currentUser->id();

    if ($uid == 0) {
      $this->messenger()->addWarning($this->t('Por favor, inicia sesión para inscribirte.'));
      return $this->redirect('user.login');
    }

    $this->progressService->enrollUser($uid, $course);
    $this->messenger()->addStatus($this->t('Te has inscrito correctamente en el curso.'));

    // Redirigir directamente al flujo de "Continuar" para que empiece la lección 1
    return $this->redirect('lms_progress.continue_course', ['course' => $course]);
  }

  /**
   * Encuentra la última lección pendiente y redirige.
   */
  public function continueCourse($course = NULL) {
    $uid = $this->currentUser->id();

    $lesson_id = $this->progressService->getNextLesson($uid, $course);

    if (!$lesson_id) {
      // Si no hay lecciones, volvemos a la página principal del curso
      $this->messenger()->addWarning($this->t('No hay lecciones disponibles en este momento.'));
      return $this->redirect('entity.node.canonical', ['node' => $course]);
    }

    // Redirección usando el objeto URL de Drupal (más limpio)
    return $this->redirect('entity.node.canonical', ['node' => $lesson_id]);
  }

  public function certificate($course = NULL) {

    $user = $this->currentUser();

    $completed = $this->progressService->isCourseComplete(
      $user->id(),
      $course
    );

    if (!$completed) {
      throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
    }

    $course_node = Node::load($course);

    $username = $user->getAccountName();
    $course_title = $course_node->getTitle();
    $date = date('F Y');

    $certificate_id = $this->progressService->generateCertificateId(
      $user->id(),
      $course
    );

    $database = \Drupal::database();

    $exists = $database->select('lms_certificates', 'c')
      ->fields('c', ['id'])
      ->condition('user_id', $user->id())
      ->condition('course_id', $course)
      ->execute()
      ->fetchField();

    if (!$exists) {
      $database->insert('lms_certificates')
        ->fields([
          'certificate_id' => $certificate_id,
          'user_id' => $user->id(),
          'course_id' => $course,
          'created' => time(),
        ])
        ->execute();
    }

    $html = "
    <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      text-align: center;
      padding: 60px;
    }

    .certificate {
      border: 8px solid #2c3e50;
      padding: 40px;
    }

    h1 {
      font-size: 40px;
      margin-bottom: 20px;
    }

    h2 {
      margin: 30px 0;
    }

    .course {
      font-size: 26px;
      font-weight: bold;
    }

    .date {
      margin-top: 40px;
      font-size: 14px;
    }
    </style>

    <div class='certificate'>
      <h1>Certificado de Finalización</h1>

      <p>Este certificado se otorga a</p>

      <h2>$username</h2>

      <p>por completar satisfactoriamente el curso</p>

      <div class='course'>$course_title</div>
      <div class='date'> Certificate ID: $certificate_id </div>
      <div class='date'>Fecha: $date</div>
    </div>
    ";

    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    $pdf = $dompdf->output();

    return new Response(
      $pdf,
      200,
      [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="certificado-'.$course.'.pdf"',
      ]
    );

  }
}
