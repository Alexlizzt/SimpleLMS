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
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


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

    $verify_url = \Drupal\Core\Url::fromRoute(
      'lms_progress.verify_certificate',
      ['certificate_id' => $certificate_id],
      ['absolute' => TRUE]
    )->toString();

    $qr = new QrCode($verify_url);
    $writer = new PngWriter();

    $result = $writer->write($qr);

    $qr_base64 = base64_encode($result->getString());

    $html = '<style>
    @page {
        margin: 0; /* Sin márgenes físicos en la hoja */
    }
    body {
        font-family: "DejaVu Sans", sans-serif;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }
    .certificate-container {
        /* Posicionamiento absoluto para evitar saltos */
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;

        border: 10px solid #2c3e50;
        padding: 40px;
        text-align: center;
        box-sizing: border-box;
    }
    h1 {
        font-size: 38px;
        margin-top: 30px;
        color: #2c3e50;
    }
    .student-name {
        font-size: 35px;
        border-bottom: 2px solid #ccc;
        display: inline-block;
        padding: 10px 40px;
        margin: 20px 0;
    }
    .course {
        font-size: 26px;
        font-weight: bold;
        margin: 15px 0;
    }
    .qr-section {
        position: absolute;
        bottom: 50px;
        left: 0;
        right: 0;
    }
    .verify-text {
        font-size: 10px;
        color: #7f8c8d;
        margin-top: 10px;
    }
    </style>

    <div class="certificate-container">
        <h1>Certificado de Finalización</h1>
        <p style="font-size: 18px;">Este certificado se otorga a</p>

        <div class="student-name">' . $username . '</div>

        <p style="font-size: 18px;">por completar satisfactoriamente el curso</p>
        <div class="course">“' . $course_title . '”</div>

        <p>Fecha de emisión: ' . $date . '</p>
        <p>ID de validación: <strong>' . $certificate_id . '</strong></p>

        <div class="qr-section">
            <img src="data:image/png;base64,' . $qr_base64 . '" width="90">
            <div class="verify-text">
                Verificar autenticidad en:<br>
                ' . $verify_url . '
            </div>
        </div>
    </div>';

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
        'Content-Disposition' => 'attachment; filename="certificado-SimpleMLS-'.$course.'.pdf"',
      ]
    );

  }

  // Verifica si el certificado es válido
  public function verify($certificate_id) {
    $database = \Drupal::database();

    $record = $database->select('lms_certificates', 'c')
      ->fields('c')
      ->condition('certificate_id', $certificate_id)
      ->execute()
      ->fetchObject();

    if (!$record) {
      return [
        '#markup' => '<h2>Certificado no válido</h2>',
      ];
    }

    $user = \Drupal\user\Entity\User::load($record->user_id);
    $course = Node::load($record->course_id);

    return [
      '#markup' =>
        '<h1>Certificado verificado</h1>
        <p>Usuario: '.$user->getAccountName().'</p>
        <p>Curso: '.$course->getTitle().'</p>
        <p>ID: '.$certificate_id.'</p>'
    ];
  }


}
