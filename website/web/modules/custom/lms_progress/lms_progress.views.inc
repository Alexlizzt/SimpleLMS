<?php

/**
 * Implements hook_views_data().
 */
function lms_progress_views_data() {
  $data = [];

  // Definimos el grupo bajo el cual aparecerán los campos en Views.
  $data['lms_course_enrollment']['table']['group'] = t('LMS Progress');

  // Hacemos que la tabla sea "entidad base" (opcional, pero útil).
  $data['lms_course_enrollment']['table']['base'] = [
    'field' => 'id',
    'title' => t('LMS Course Enrollment'),
    'help' => t('Contiene datos de inscripciones de usuarios a cursos.'),
  ];

  // Definir la unión con la tabla de Nodos (Content).
  // Esto permite que cuando estés en una vista de Contenido, puedas añadir la relación.
  $data['lms_course_enrollment']['table']['join'] = [
    'node_field_data' => [
      'left_field' => 'nid',
      'field' => 'course_id',
    ],
    'users_field_data' => [
      'left_field' => 'uid',
      'field' => 'user_id',
    ],
  ];

  // Definimos el campo course_id como una RELACIÓN.
  $data['lms_course_enrollment']['course_id'] = [
    'title' => t('Curso Relacionado'),
    'help' => t('Relaciona la inscripción con el nodo del curso.'),
    'relationship' => [
      'base' => 'node_field_data', // Tabla con la que une.
      'base field' => 'nid',
      'id' => 'standard',
      'label' => t('Relación: Nodo del Curso'),
    ],
  ];

  // Definimos el campo user_id para poder ver quién está inscrito.
  $data['lms_course_enrollment']['user_id'] = [
    'title' => t('Usuario Inscrito'),
    'help' => t('Filtra por el ID del usuario inscrito.'),
    'relationship' => [
      'base' => 'users_field_data',
      'base field' => 'uid',
      'id' => 'standard',
      'label' => t('Relación: Usuario'),
    ],
    // AÑADE ESTO: Permite que aparezca en Filtros Contextuales
    'argument' => [
      'id' => 'numeric',
    ],
    // OPCIONAL: Permite que aparezca en Filtros Normales
    'filter' => [
      'id' => 'numeric',
    ],
  ];

  // Añadimos el campo "created" para poder mostrar la fecha.
  $data['lms_course_enrollment']['created'] = [
    'title' => t('Fecha de inscripción'),
    'help' => t('La fecha en la que el usuario se inscribió.'),
    'field' => [
      'id' => 'date',
    ],
    'sort' => [
      'id' => 'date',
    ],
    'filter' => [
      'id' => 'date',
    ],
  ];

  return $data;
}

/**
 * Implements hook_views_data_alter().
 */
function lms_progress_views_data_alter(array &$data) {
  // Esto le dice a la tabla de Nodos que tiene una relación con las inscripciones.
  $data['node_field_data']['lms_course_enrollment_rel'] = [
    'title' => t('Inscripciones del curso'),
    'help' => t('Relación desde el curso hacia la tabla de inscripciones.'),
    'relationship' => [
      'base' => 'lms_course_enrollment',
      'base field' => 'course_id',
      'field' => 'nid',
      'id' => 'standard',
      'label' => t('Inscripción LMS'),
    ],
  ];
}
