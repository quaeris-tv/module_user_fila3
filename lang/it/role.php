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
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei ruoli del sistema',
        ],
        'label' => 'role',
        'sort' => 84,
        'icon' => 'user-user-role',
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
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'team_id' => [
            'label' => 'team_id',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'recordId' => [
            'label' => 'recordId',
        ],
        'attach' => [
            'label' => 'attach',
        ],
        'id' => [
            'label' => 'id',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'view' => [
            'label' => 'view',
        ],
        'create' => [
            'label' => 'create',
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
    'plural' => [
        'model' => [
            'label' => 'role.plural.model',
        ],
    ],
];
