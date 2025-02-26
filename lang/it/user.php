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
        'sort' => 26,
        'icon' => 'user-main',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci l\'email',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
        ],
        'password_confirmation' => [
            'label' => 'Conferma Password',
            'placeholder' => 'Conferma la password',
        ],
        'current_password' => [
            'label' => 'Password Attuale',
            'placeholder' => 'Inserisci la password attuale',
        ],
        'role' => [
            'label' => 'Ruolo',
        ],
        'roles' => [
            'label' => 'Ruoli',
        ],
        'permissions' => [
            'label' => 'Permessi',
        ],
        'status' => [
            'label' => 'Stato',
            'options' => [
                'active' => 'Attivo',
                'inactive' => 'Inattivo',
                'blocked' => 'Bloccato',
            ],
        ],
        'last_login' => [
            'label' => 'Ultimo Accesso',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
        ],
        'avatar' => [
            'label' => 'Avatar',
        ],
        'language' => [
            'label' => 'Lingua',
        ],
        'timezone' => [
            'label' => 'Fuso Orario',
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
