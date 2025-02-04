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
    'sort' => 49,
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
);