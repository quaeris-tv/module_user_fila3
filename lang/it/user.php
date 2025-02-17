<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utenti',
        'group' => 'Sistema',
        'sort' => 10,
        'icon' => 'user-icon',
        'badge' => [
            'color' => 'success',
            'label' => 'Gestione',
        ],
    ],

    'sections' => [
        'profile' => [
            'navigation' => [
                'name' => 'Profili',
                'group' => 'Utenti',
                'sort' => 10,
                'icon' => 'user-icon',
                'badge' => [
                    'color' => 'info',
                    'label' => 'Personale',
                ],
            ],
            'fields' => [
                'name' => 'Nome',
                'surname' => 'Cognome',
                'email' => 'Email',
                'phone' => 'Telefono',
                'avatar' => 'Avatar',
                'language' => 'Lingua',
                'timezone' => 'Fuso Orario',
                'status' => 'Stato',
                'last_login' => 'Ultimo Accesso',
                'two_factor' => 'Autenticazione a Due Fattori',
            ],
        ],

        'role' => [
            'navigation' => [
                'name' => 'Ruoli',
                'group' => 'Utenti',
                'sort' => 20,
                'icon' => 'user-role-icon',
                'badge' => [
                    'color' => 'warning',
                    'label' => 'Autorizzazioni',
                ],
            ],
            'fields' => [
                'name' => 'Nome',
                'guard_name' => 'Guard',
                'permissions' => 'Permessi',
                'users_count' => 'Numero Utenti',
                'description' => 'Descrizione',
                'level' => 'Livello',
            ],
            'levels' => [
                'admin' => 'Amministratore',
                'manager' => 'Gestore',
                'user' => 'Utente',
                'guest' => 'Ospite',
            ],
        ],

        'permission' => [
            'navigation' => [
                'name' => 'Permessi',
                'group' => 'Utenti',
                'sort' => 30,
                'icon' => 'user-permission-icon',
                'badge' => [
                    'color' => 'danger',
                    'label' => 'Sicurezza',
                ],
            ],
            'fields' => [
                'name' => 'Nome',
                'guard_name' => 'Guard',
                'roles' => 'Ruoli',
                'description' => 'Descrizione',
                'group' => 'Gruppo',
            ],
        ],
    ],

    'common' => [
        'status' => [
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'suspended' => 'Sospeso',
            'pending' => 'In Attesa',
            'banned' => 'Bannato',
        ],
        'actions' => [
            'create' => 'Crea',
            'edit' => 'Modifica',
            'delete' => 'Elimina',
            'view' => 'Visualizza',
            'suspend' => 'Sospendi',
            'activate' => 'Attiva',
            'ban' => 'Banna',
            'unban' => 'Riattiva',
            'impersonate' => 'Impersona',
            'reset_password' => 'Reset Password',
            'send_verification' => 'Invia Verifica',
        ],
        'messages' => [
            'success' => [
                'created' => 'Utente creato con successo',
                'updated' => 'Utente aggiornato con successo',
                'deleted' => 'Utente eliminato con successo',
                'suspended' => 'Utente sospeso con successo',
                'activated' => 'Utente attivato con successo',
                'banned' => 'Utente bannato con successo',
                'unbanned' => 'Utente riattivato con successo',
                'verification_sent' => 'Email di verifica inviata con successo',
            ],
            'error' => [
                'create' => 'Errore durante la creazione dell\'utente',
                'update' => 'Errore durante l\'aggiornamento dell\'utente',
                'delete' => 'Errore durante l\'eliminazione dell\'utente',
                'suspend' => 'Errore durante la sospensione dell\'utente',
                'activate' => 'Errore durante l\'attivazione dell\'utente',
                'ban' => 'Errore durante il ban dell\'utente',
                'unban' => 'Errore durante la riattivazione dell\'utente',
                'verification_send' => 'Errore durante l\'invio dell\'email di verifica',
            ],
            'confirm' => [
                'delete' => 'Sei sicuro di voler eliminare questo utente?',
                'suspend' => 'Sei sicuro di voler sospendere questo utente?',
                'ban' => 'Sei sicuro di voler bannare questo utente?',
                'impersonate' => 'Sei sicuro di voler impersonare questo utente?',
            ],
        ],
        'filters' => [
            'role' => 'Ruolo',
            'status' => 'Stato',
            'verified' => 'Verificato',
            'created' => 'Data Creazione',
            'last_login' => 'Ultimo Accesso',
        ],
        'notifications' => [
            'welcome' => [
                'subject' => 'Benvenuto su :app',
                'greeting' => 'Ciao :name',
                'message' => 'Benvenuto su :app! Siamo felici di averti con noi.',
            ],
            'verification' => [
                'subject' => 'Verifica Email',
                'greeting' => 'Ciao :name',
                'message' => 'Clicca sul pulsante qui sotto per verificare il tuo indirizzo email.',
                'button' => 'Verifica Email',
            ],
            'password_reset' => [
                'subject' => 'Reset Password',
                'greeting' => 'Ciao :name',
                'message' => 'Hai richiesto il reset della password. Clicca sul pulsante qui sotto per procedere.',
                'button' => 'Reset Password',
            ],
        ],
    ],
];
