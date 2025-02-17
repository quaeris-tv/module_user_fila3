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