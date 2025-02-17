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
            'description' => 'Gestione degli utenti e dei loro permessi',
        ],
        'label' => 'Utenti',
        'sort' => 70,
        'icon' => 'user-user-animated',
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
        'last_login' => 'Ultimo Accesso',
        'created_at' => 'Data Creazione',
        'updated_at' => 'Ultima Modifica',
        'avatar' => 'Avatar',
        'language' => 'Lingua',
        'timezone' => 'Fuso Orario',
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
    'messages' => [
        'created' => 'Utente creato con successo',
        'updated' => 'Utente aggiornato con successo',
        'deleted' => 'Utente eliminato con successo',
        'blocked' => 'Utente bloccato con successo',
        'unblocked' => 'Utente sbloccato con successo',
        'reset_link_sent' => 'Link per il reset della password inviato',
        'email_verified' => 'Email verificata con successo',
        'impersonating' => 'Stai impersonando l\'utente :name',
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
