<<<<<<< HEAD
<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente',
        'plural' => 'Utenti',
        'group' => 'Utenti',
        'label' => 'user',
        'sort' => 60,
    ],
    'fields' => [
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'name' => [
            'label' => 'Nome',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'created_at' => [
            'label' => 'Data di Creazione',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
        ],
        'role' => [
            'name' => [
                'label' => 'Ruolo',
            ],
        ],
        'active' => 'Attivo',
        'id' => [
            'label' => 'ID',
        ],
        'password' => 'Password',
        'password_confirmation' => 'Conferma Password',
        'email_verified_at' => [
            'label' => 'Email Verificata',
        ],
        'teams' => [
            'name' => [
                'label' => 'Nome Team',
            ],
        ],
        'roles' => [
            'name' => [
                'label' => 'Nome Ruolo',
            ],
        ],
        'password_expires_at' => [
            'label' => 'Scadenza Password',
        ],
        'verified' => [
            'label' => 'Verificato',
        ],
        'unverified' => [
            'label' => 'Non Verificato',
        ],
        'deactivate' => [
            'label' => 'deactivate',
        ],
        'changePassword' => [
            'label' => 'changePassword',
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
    ],
    'filters' => [
        'active_users' => 'Utenti Attivi',
        'creation_date' => 'Data di Creazione',
        'date_from' => 'Dal',
        'date_to' => 'Al',
        'verified' => 'Utenti Verificati',
        'unverified' => 'Utenti Non Verificati',
    ],
    'messages' => [
        'no_records' => 'Nessun utente trovato',
        'loading' => 'Caricamento utenti...',
        'search' => 'Cerca utenti...',
    ],
    'actions' => [
        'toggle_layout' => 'Cambia Layout',
        'create' => [
            'label' => 'Crea Utente',
        ],
        'delete' => 'Elimina Utente',
        'associate' => 'Associa Utente',
        'bulk_delete' => 'Elimina Selezionati',
        'bulk_detach' => 'Scollega Selezionati',
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
                'name' => 'Nome Area',
                'parent_name' => 'Nome Area Superiore',
            ],
        ],
        'change_password' => 'Cambia Password',
    ],
    'modals' => [
        'create' => [
            'heading' => 'Crea Utente',
            'description' => 'Crea un nuovo utente',
            'actions' => [
                'submit' => 'Crea',
                'cancel' => 'Annulla',
            ],
        ],
        'edit' => [
            'heading' => 'Modifica Utente',
            'description' => 'Modifica le informazioni dell’utente',
            'actions' => [
                'submit' => 'Salva Modifiche',
                'cancel' => 'Annulla',
            ],
        ],
        'delete' => [
            'heading' => 'Elimina Utente',
            'description' => 'Sei sicuro di voler eliminare questo utente?',
            'actions' => [
                'submit' => 'Elimina',
                'cancel' => 'Annulla',
            ],
        ],
        'associate' => [
            'heading' => 'Associa Utente',
            'description' => 'Seleziona un utente da associare',
            'actions' => [
                'submit' => 'Associa',
                'cancel' => 'Annulla',
            ],
        ],
        'detach' => [
            'heading' => 'Scollega Utente',
            'description' => 'Sei sicuro di voler scollegare questo utente?',
            'actions' => [
                'submit' => 'Scollega',
                'cancel' => 'Annulla',
            ],
        ],
        'bulk_delete' => [
            'heading' => 'Elimina Utenti Selezionati',
            'description' => 'Sei sicuro di voler eliminare gli utenti selezionati?',
            'actions' => [
                'submit' => 'Elimina Selezionati',
                'cancel' => 'Annulla',
            ],
        ],
    ],
    'plural' => [
        'model' => [
            'label' => 'Utenti',
        ],
    ],
    'model' => [
        'label' => 'Utente',
    ],
];
=======
<?php return array (
  'navigation' => 
  array (
    'name' => 'Utente',
    'plural' => 'Utenti',
    'group' => 'Utenti',
    'label' => 'user',
    'sort' => 7,
  ),
  'fields' => 
  array (
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
    'name' => 
    array (
      'label' => 'Nome',
    ),
    'email' => 
    array (
      'label' => 'Email',
    ),
    'created_at' => 
    array (
      'label' => 'Data di Creazione',
    ),
    'updated_at' => 
    array (
      'label' => 'Ultima Modifica',
    ),
    'role' => 
    array (
      'name' => 
      array (
        'label' => 'Ruolo',
      ),
    ),
    'active' => 'Attivo',
    'id' => 
    array (
      'label' => 'ID',
    ),
    'password' => 'Password',
    'password_confirmation' => 'Conferma Password',
    'email_verified_at' => 
    array (
      'label' => 'Email Verificata',
    ),
    'teams' => 
    array (
      'name' => 
      array (
        'label' => 'Nome Team',
      ),
    ),
    'roles' => 
    array (
      'name' => 
      array (
        'label' => 'Nome Ruolo',
      ),
    ),
    'password_expires_at' => 
    array (
      'label' => 'Scadenza Password',
    ),
    'verified' => 
    array (
      'label' => 'Verificato',
    ),
    'unverified' => 
    array (
      'label' => 'Non Verificato',
    ),
    'deactivate' => 
    array (
      'label' => 'deactivate',
    ),
    'changePassword' => 
    array (
      'label' => 'changePassword',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
  ),
  'filters' => 
  array (
    'active_users' => 'Utenti Attivi',
    'creation_date' => 'Data di Creazione',
    'date_from' => 'Dal',
    'date_to' => 'Al',
    'verified' => 'Utenti Verificati',
    'unverified' => 'Utenti Non Verificati',
  ),
  'messages' => 
  array (
    'no_records' => 'Nessun utente trovato',
    'loading' => 'Caricamento utenti...',
    'search' => 'Cerca utenti...',
  ),
  'actions' => 
  array (
    'toggle_layout' => 'Cambia Layout',
    'create' => 
    array (
      'label' => 'Crea Utente',
    ),
    'delete' => 'Elimina Utente',
    'associate' => 'Associa Utente',
    'bulk_delete' => 'Elimina Selezionati',
    'bulk_detach' => 'Scollega Selezionati',
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
        'name' => 'Nome Area',
        'parent_name' => 'Nome Area Superiore',
      ),
    ),
    'change_password' => 'Cambia Password',
  ),
  'modals' => 
  array (
    'create' => 
    array (
      'heading' => 'Crea Utente',
      'description' => 'Crea un nuovo utente',
      'actions' => 
      array (
        'submit' => 'Crea',
        'cancel' => 'Annulla',
      ),
    ),
    'edit' => 
    array (
      'heading' => 'Modifica Utente',
      'description' => 'Modifica le informazioni dell’utente',
      'actions' => 
      array (
        'submit' => 'Salva Modifiche',
        'cancel' => 'Annulla',
      ),
    ),
    'delete' => 
    array (
      'heading' => 'Elimina Utente',
      'description' => 'Sei sicuro di voler eliminare questo utente?',
      'actions' => 
      array (
        'submit' => 'Elimina',
        'cancel' => 'Annulla',
      ),
    ),
    'associate' => 
    array (
      'heading' => 'Associa Utente',
      'description' => 'Seleziona un utente da associare',
      'actions' => 
      array (
        'submit' => 'Associa',
        'cancel' => 'Annulla',
      ),
    ),
    'detach' => 
    array (
      'heading' => 'Scollega Utente',
      'description' => 'Sei sicuro di voler scollegare questo utente?',
      'actions' => 
      array (
        'submit' => 'Scollega',
        'cancel' => 'Annulla',
      ),
    ),
    'bulk_delete' => 
    array (
      'heading' => 'Elimina Utenti Selezionati',
      'description' => 'Sei sicuro di voler eliminare gli utenti selezionati?',
      'actions' => 
      array (
        'submit' => 'Elimina Selezionati',
        'cancel' => 'Annulla',
      ),
    ),
  ),
  'plural' => 
  array (
    'model' => 
    array (
      'label' => 'Utenti',
    ),
  ),
  'model' => 
  array (
    'label' => 'Utente',
  ),
);
>>>>>>> origin/dev
