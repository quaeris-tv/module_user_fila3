<?php
<?php return array (
  'navigation' => 
  array (
    'name' => 'Permessi',
    'plural' => 'Permessi',
    'group' => 
    array (
      'name' => 'Gestione Utenti',
      'description' => 'Gestione dei permessi di sistema',
    ),
    'label' => 'Permessi',
    'sort' => 44,
    'icon' => 'user-permission-animated',
  ),
  'fields' => 
  array (
    'name' => 'Nome Permesso',
    'guard_name' => 'Guard',
    'roles' => 'Ruoli',
    'users' => 'Utenti',
    'created_at' => 'Data Creazione',
    'updated_at' => 'Ultima Modifica',
    'description' => 'Descrizione',
  ),
  'actions' => 
  array (
    'create' => 'Crea Permesso',
    'edit' => 'Modifica Permesso',
    'delete' => 'Elimina Permesso',
    'assign_to_role' => 'Assegna a Ruolo',
    'remove_from_role' => 'Rimuovi da Ruolo',
    'assign_to_user' => 'Assegna a Utente',
    'remove_from_user' => 'Rimuovi da Utente',
  ),
  'messages' => 
  array (
    'created' => 'Permesso creato con successo',
    'updated' => 'Permesso aggiornato con successo',
    'deleted' => 'Permesso eliminato con successo',
    'assigned_to_role' => 'Permesso assegnato al ruolo con successo',
    'removed_from_role' => 'Permesso rimosso dal ruolo con successo',
    'assigned_to_user' => 'Permesso assegnato all\'utente con successo',
    'removed_from_user' => 'Permesso rimosso dall\'utente con successo',
    'in_use' => 'Non puoi eliminare un permesso in uso',
  ),
  'groups' => 
  array (
    'user_management' => 
    array (
      'name' => 'Gestione Utenti',
      'description' => 'Permessi relativi alla gestione degli utenti',
    ),
    'role_management' => 
    array (
      'name' => 'Gestione Ruoli',
      'description' => 'Permessi relativi alla gestione dei ruoli',
    ),
    'content_management' => 
    array (
      'name' => 'Gestione Contenuti',
      'description' => 'Permessi relativi alla gestione dei contenuti',
    ),
    'system_settings' => 
    array (
      'name' => 'Impostazioni Sistema',
      'description' => 'Permessi relativi alle impostazioni di sistema',
    ),
  ),
  'levels' => 
  array (
    'view' => 'Visualizza',
    'create' => 'Crea',
    'edit' => 'Modifica',
    'delete' => 'Elimina',
    'manage' => 'Gestisci',
    'full' => 'Accesso Completo',
  ),
);
=======
<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Permessi',
        'plural' => 'Permessi',
        'group' => [
            'name' => 'Gestione Utenti',
<<<<<<< HEAD
            'description' => 'Gestione dei permessi di sistema',
        ],
        'label' => 'Permessi',
        'sort' => 72,
        'icon' => 'user-permission-animated',
=======
            'description' => 'Gestione dei permessi del sistema',
        ],
        'label' => 'permission',
        'sort' => 98,
        'icon' => 'user-user-permission',
>>>>>>> origin/dev
    ],
    'fields' => [
        'name' => 'Nome Permesso',
        'guard_name' => 'Guard',
        'roles' => 'Ruoli',
        'users' => 'Utenti',
        'created_at' => 'Data Creazione',
        'updated_at' => 'Ultima Modifica',
        'description' => 'Descrizione',
    ],
    'actions' => [
        'create' => 'Crea Permesso',
        'edit' => 'Modifica Permesso',
        'delete' => 'Elimina Permesso',
        'assign_to_role' => 'Assegna a Ruolo',
        'remove_from_role' => 'Rimuovi da Ruolo',
        'assign_to_user' => 'Assegna a Utente',
        'remove_from_user' => 'Rimuovi da Utente',
    ],
    'messages' => [
        'created' => 'Permesso creato con successo',
        'updated' => 'Permesso aggiornato con successo',
        'deleted' => 'Permesso eliminato con successo',
        'assigned_to_role' => 'Permesso assegnato al ruolo con successo',
        'removed_from_role' => 'Permesso rimosso dal ruolo con successo',
        'assigned_to_user' => 'Permesso assegnato all\'utente con successo',
        'removed_from_user' => 'Permesso rimosso dall\'utente con successo',
        'in_use' => 'Non puoi eliminare un permesso in uso',
    ],
    'groups' => [
        'user_management' => [
            'name' => 'Gestione Utenti',
            'description' => 'Permessi relativi alla gestione degli utenti',
        ],
        'role_management' => [
            'name' => 'Gestione Ruoli',
            'description' => 'Permessi relativi alla gestione dei ruoli',
        ],
        'content_management' => [
            'name' => 'Gestione Contenuti',
            'description' => 'Permessi relativi alla gestione dei contenuti',
        ],
        'system_settings' => [
            'name' => 'Impostazioni Sistema',
            'description' => 'Permessi relativi alle impostazioni di sistema',
        ],
    ],
    'levels' => [
        'view' => 'Visualizza',
        'create' => 'Crea',
        'edit' => 'Modifica',
        'delete' => 'Elimina',
        'manage' => 'Gestisci',
        'full' => 'Accesso Completo',
    ],
];
>>>>>>> 6fb7ca2eb5c3803f511c33f86773bc441bd59c53
