<?php
<?php return array (
  'navigation' => 
  array (
    'name' => 'Utenti',
    'plural' => 'Utenti',
    'group' => 
    array (
      'name' => 'Gestione Utenti',
      'description' => 'Gestione degli utenti e dei loro permessi',
    ),
    'label' => 'Utenti',
    'sort' => 26,
    'icon' => 'user-user-animated',
  ),
  'fields' => 
  array (
    'name' => 'Nome',
    'email' => 'Email',
    'password' => 'Password',
    'password_confirmation' => 'Conferma Password',
    'current_password' => 'Password Attuale',
    'role' => 'Ruolo',
    'roles' => 'Ruoli',
    'permissions' => 'Permessi',
    'status' => 
    array (
      'label' => 'Stato',
      'active' => 'Attivo',
      'inactive' => 'Inattivo',
      'blocked' => 'Bloccato',
    ),
    'last_login' => 'Ultimo Accesso',
    'created_at' => 'Data Creazione',
    'updated_at' => 'Ultima Modifica',
    'avatar' => 'Avatar',
    'language' => 'Lingua',
    'timezone' => 'Fuso Orario',
  ),
  'actions' => 
  array (
    'create' => 'Crea Utente',
    'edit' => 'Modifica Utente',
    'delete' => 'Elimina Utente',
    'impersonate' => 'Impersona Utente',
    'stop_impersonating' => 'Termina Impersonificazione',
    'block' => 'Blocca',
    'unblock' => 'Sblocca',
    'send_reset_link' => 'Invia Link Reset Password',
    'verify_email' => 'Verifica Email',
  ),
  'messages' => 
  array (
    'created' => 'Utente creato con successo',
    'updated' => 'Utente aggiornato con successo',
    'deleted' => 'Utente eliminato con successo',
    'blocked' => 'Utente bloccato con successo',
    'unblocked' => 'Utente sbloccato con successo',
    'reset_link_sent' => 'Link per il reset della password inviato',
    'email_verified' => 'Email verificata con successo',
    'impersonating' => 'Stai impersonando l\'utente :name',
  ),
  'validation' => 
  array (
    'email_unique' => 'Questa email è già in uso',
    'password_min' => 'La password deve essere di almeno :min caratteri',
    'password_confirmed' => 'Le password non coincidono',
    'current_password' => 'La password attuale non è corretta',
  ),
  'permissions' => 
  array (
    'view_users' => 'Visualizza utenti',
    'create_users' => 'Crea utenti',
    'edit_users' => 'Modifica utenti',
    'delete_users' => 'Elimina utenti',
    'impersonate_users' => 'Impersona utenti',
    'manage_roles' => 'Gestisci ruoli',
  ),
);
=======
<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utenti',
        'plural' => 'Utenti',
        'group' => [
            'name' => 'Gestione Utenti',
<<<<<<< HEAD
            'description' => 'Gestione degli utenti e dei loro permessi',
        ],
        'label' => 'Utenti',
        'sort' => 70,
        'icon' => 'user-user-animated',
=======
            'description' => 'Gestione degli utenti, ruoli e permessi',
        ],
        'label' => 'user',
        'sort' => 80,
        'icon' => 'user-main',
    ],
    'sections' => [
        'users' => [
            'icon' => 'user-user-main',
            'label' => 'Lista Utenti',
        ],
        'groups' => [
            'icon' => 'user-user-group',
            'label' => 'Gruppi',
        ],
        'roles' => [
            'icon' => 'user-user-role',
            'label' => 'Ruoli',
        ],
        'permissions' => [
            'icon' => 'user-user-permission',
            'label' => 'Permessi',
        ],
>>>>>>> origin/dev
    ],
    'fields' => [
        'name' => 'Nome',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Conferma Password',
        'current_password' => 'Password Attuale',
        'role' => 'Ruolo',
        'roles' => 'Ruoli',
        'permissions' => 'Permessi',
        'status' => [
            'label' => 'Stato',
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'blocked' => 'Bloccato',
        ],
<<<<<<< HEAD
        'last_login' => 'Ultimo Accesso',
        'created_at' => 'Data Creazione',
        'updated_at' => 'Ultima Modifica',
        'avatar' => 'Avatar',
        'language' => 'Lingua',
        'timezone' => 'Fuso Orario',
=======
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
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'isActive' => [
            'label' => 'isActive',
        ],
        'delete' => [
            'label' => 'delete',
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
>>>>>>> origin/dev
    ],
    'actions' => [
        'create' => 'Crea Utente',
        'edit' => 'Modifica Utente',
        'delete' => 'Elimina Utente',
        'impersonate' => 'Impersona Utente',
        'stop_impersonating' => 'Termina Impersonificazione',
        'block' => 'Blocca',
        'unblock' => 'Sblocca',
        'send_reset_link' => 'Invia Link Reset Password',
        'verify_email' => 'Verifica Email',
    ],
<<<<<<< HEAD
    'messages' => [
        'created' => 'Utente creato con successo',
        'updated' => 'Utente aggiornato con successo',
        'deleted' => 'Utente eliminato con successo',
        'blocked' => 'Utente bloccato con successo',
        'unblocked' => 'Utente sbloccato con successo',
        'reset_link_sent' => 'Link per il reset della password inviato',
        'email_verified' => 'Email verificata con successo',
        'impersonating' => 'Stai impersonando l\'utente :name',
=======
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
            'description' => 'Modifica le informazioni dell\'utente',
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
>>>>>>> origin/dev
    ],
    'validation' => [
        'email_unique' => 'Questa email è già in uso',
        'password_min' => 'La password deve essere di almeno :min caratteri',
        'password_confirmed' => 'Le password non coincidono',
        'current_password' => 'La password attuale non è corretta',
    ],
    'permissions' => [
        'view_users' => 'Visualizza utenti',
        'create_users' => 'Crea utenti',
        'edit_users' => 'Modifica utenti',
        'delete_users' => 'Elimina utenti',
        'impersonate_users' => 'Impersona utenti',
        'manage_roles' => 'Gestisci ruoli',
    ],
];
>>>>>>> 6fb7ca2eb5c3803f511c33f86773bc441bd59c53
