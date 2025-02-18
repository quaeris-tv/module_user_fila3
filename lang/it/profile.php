<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Profilo',
        'plural' => 'Profili',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei profili utente',
        ],
        'label' => 'Profilo',
        'sort' => 73,
        'icon' => 'user-profile-animated',
    ],
    'fields' => [
        'personal_info' => [
            'label' => 'Informazioni Personali',
            'first_name' => 'Nome',
            'last_name' => 'Cognome',
            'email' => 'Email',
            'phone' => 'Telefono',
            'birth_date' => 'Data di Nascita',
            'gender' => [
                'label' => 'Genere',
                'male' => 'Maschio',
                'female' => 'Femmina',
                'other' => 'Altro',
            ],
        ],
        'preferences' => [
            'label' => 'Preferenze',
            'language' => 'Lingua',
            'timezone' => 'Fuso Orario',
            'notifications' => 'Notifiche',
            'theme' => [
                'label' => 'Tema',
                'light' => 'Chiaro',
                'dark' => 'Scuro',
                'system' => 'Sistema',
            ],
        ],
        'security' => [
            'label' => 'Sicurezza',
            'current_password' => 'Password Attuale',
            'new_password' => 'Nuova Password',
            'confirm_password' => 'Conferma Password',
            'two_factor' => 'Autenticazione a Due Fattori',
            'recovery_codes' => 'Codici di Recupero',
        ],
<<<<<<< HEAD
        'avatar' => [
            'label' => 'Avatar',
            'upload' => 'Carica Avatar',
            'remove' => 'Rimuovi Avatar',
            'change' => 'Cambia Avatar',
        ],
    ],
    'actions' => [
        'update_profile' => 'Aggiorna Profilo',
        'change_password' => 'Cambia Password',
        'enable_2fa' => 'Attiva 2FA',
        'disable_2fa' => 'Disattiva 2FA',
        'generate_recovery_codes' => 'Genera Codici di Recupero',
    ],
    'messages' => [
        'profile_updated' => 'Profilo aggiornato con successo',
        'password_changed' => 'Password cambiata con successo',
        '2fa_enabled' => 'Autenticazione a due fattori attivata',
        '2fa_disabled' => 'Autenticazione a due fattori disattivata',
        'recovery_codes_generated' => 'Codici di recupero generati',
        'avatar_updated' => 'Avatar aggiornato con successo',
    ],
    'validation' => [
        'current_password' => 'La password attuale non è corretta',
        'password_min' => 'La password deve essere di almeno :min caratteri',
        'password_confirmed' => 'Le password non coincidono',
        'avatar_size' => 'L\'avatar deve essere massimo :size KB',
        'avatar_dimensions' => 'L\'avatar deve essere :width x :height pixel',
=======
        'id' => [
            'label' => 'ID',
        ],
        'ente' => [
            'label' => 'Ente',
        ],
        'matr' => [
            'label' => 'Matricola',
        ],
        'first_name' => [
            'label' => 'Nome',
            'fields' => [
                'label' => 'Nome',
            ],
        ],
        'last_name' => [
            'label' => 'Cognome',
            'fields' => [
                'label' => 'Cognome',
            ],
        ],
        'email' => [
            'label' => 'Email',
            'fields' => [
                'label' => 'Email',
            ],
        ],
        'is_active' => [
            'label' => 'Attivo',
            'fields' => [
                'label' => 'Attivo',
            ],
        ],
        'delete' => [
            'label' => 'Elimina',
        ],
        'toggleColumns' => [
            'label' => 'Mostra/Nascondi Colonne',
        ],
        'reorderRecords' => [
            'label' => 'Riordina Record',
        ],
        'resetFilters' => [
            'label' => 'Resetta Filtri',
        ],
        'applyFilters' => [
            'label' => 'Applica Filtri',
        ],
    ],
    'personal_info' => [
        'heading' => 'Informazioni Personali',
        'subheading' => 'Gestisci le tue informazioni personali.',
        'submit' => [
            'label' => 'Aggiorna',
        ],
        'notify' => 'Profilo aggiornato correttamente!',
>>>>>>> origin/dev
    ],
    'navigation' => [
        'name' => 'Profilo',
        'plural' => 'Profili',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei profili',
        ],
        'label' => 'profili',
        'sort' => 71,
        'icon' => 'user-profile',
    ],
];
