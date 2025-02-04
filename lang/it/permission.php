<<<<<<< HEAD
<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Permesso',
        'plural' => 'Permessi',
        'group' => [
            'name' => 'Admin',
        ],
        'label' => 'permission',
        'sort' => 86,
    ],
    'fields' => [
        'name' => 'Nome',
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'roles' => 'Ruoli',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'role' => [
            'label' => 'role',
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
  'navigation' => 
  array (
    'name' => 'Permesso',
    'plural' => 'Permessi',
    'group' => 
    array (
      'name' => 'Admin',
    ),
    'label' => 'permission',
    'sort' => 24,
  ),
  'fields' => 
  array (
    'name' => 'Nome',
    'guard_name' => 'Guard',
    'permissions' => 'Permessi',
    'roles' => 'Ruoli',
    'updated_at' => 'Aggiornato il',
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
    'role' => 
    array (
      'label' => 'role',
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
