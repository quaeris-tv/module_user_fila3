<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente',
        'plural' => 'Utenti',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'name' => 'Nome',
        'email' => 'Email',
        'created_at' => 'Data Creazione',
        'updated_at' => 'Ultima Modifica',
        'role' => 'Ruolo',
        'active' => 'Attivo',
    ],
    'filters' => [
        'active_users' => 'Utenti Attivi',
        'creation_date' => 'Data di Creazione',
        'date_from' => 'Dal',
        'date_to' => 'Al',
    ],
    'messages' => [
        'no_records' => 'Nessun utente trovato',
        'loading' => 'Caricamento utenti...',
        'search' => 'Cerca utenti...',
    ],
    'actions' => [
        'attach_user' => 'Collega Utente',
        'associate_user' => 'Associa Utente',
        'user_actions' => 'Azioni Utente',
        'view' => 'Visualizza',
        'edit' => 'Modifica',
        'detach' => 'Scollega',
        'row_actions' => 'Azioni',
        'delete_selected' => 'Elimina Selezionati',
        'confirm_detach' => 'Sei sicuro di voler scollegare questo utente?',
        'confirm_delete' => 'Sei sicuro di voler eliminare gli utenti selezionati?',
        'success_attached' => 'Utente collegato con successo',
        'success_detached' => 'Utente scollegato con successo',
        'success_deleted' => 'Utenti eliminati con successo',
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
        'change_password' => 'Cambio password',
    ],
];
