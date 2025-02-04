<<<<<<< HEAD
<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Team',
        'plural' => 'Teams',
        'group' => [
            'name' => 'Admin',
        ],
        'label' => 'team',
        'sort' => 97,
    ],
    'fields' => [
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
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
        'create' => [
            'label' => 'create',
        ],
    ],
];
=======
<?php return array (
  'navigation' => 
  array (
    'name' => 'Team',
    'plural' => 'Teams',
    'group' => 
    array (
      'name' => 'Admin',
    ),
    'label' => 'team',
    'sort' => 4,
  ),
  'fields' => 
  array (
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
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
    'create' => 
    array (
      'label' => 'create',
    ),
  ),
  'plural' => 
  array (
    'model' => 
    array (
      'label' => 'team.plural.model',
    ),
  ),
);
>>>>>>> origin/dev
