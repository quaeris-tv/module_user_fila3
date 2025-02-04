<<<<<<< HEAD
<?php

declare(strict_types=1);

return [
    'resources' => 'Risorse',
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Ruolo',
        'plural' => 'Ruoli',
        'group' => [
            'name' => 'Admin',
        ],
        'label' => 'role',
        'sort' => 90,
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
        ],
        'guard_name' => [
            'label' => 'Guard',
        ],
        'permissions' => 'Permessi',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'select_all' => [
            'name' => 'Seleziona Tutti',
            'message' => '',
        ],
        'team' => [
            'name' => [
                'label' => 'team.name',
            ],
        ],
        'detach' => [
            'label' => 'detach',
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
];
=======
<?php return array (
  'resources' => 'Risorse',
  'pages' => 'Pagine',
  'widgets' => 'Widgets',
  'navigation' => 
  array (
    'name' => 'Ruolo',
    'plural' => 'Ruoli',
    'group' => 
    array (
      'name' => 'Admin',
    ),
    'label' => 'role',
    'sort' => 78,
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
    ),
    'guard_name' => 
    array (
      'label' => 'Guard',
    ),
    'permissions' => 'Permessi',
    'updated_at' => 'Aggiornato il',
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
    'select_all' => 
    array (
      'name' => 'Seleziona Tutti',
      'message' => '',
    ),
    'team' => 
    array (
      'name' => 
      array (
        'label' => 'team.name',
      ),
    ),
    'detach' => 
    array (
      'label' => 'detach',
    ),
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'export' => 
    array (
      'filename_prefix' => 'Aree al',
      'columns' => 
      array (
        'name' => 'Nome area',
        'parent_name' => 'Nome area livello superiore',
      ),
    ),
  ),
);
>>>>>>> origin/dev
