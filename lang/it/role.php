<?php return array (
  'navigation' => 
  array (
    'name' => 'Ruoli',
    'plural' => 'Ruoli',
    'group' => 
    array (
      'name' => 'Gestione Utenti',
      'description' => 'Gestione dei ruoli e dei permessi associati',
    ),
    'label' => 'Ruoli',
    'sort' => 26,
    'icon' => 'user-role-animated',
  ),
  'fields' => 
  array (
    'name' => 'Nome Ruolo',
    'guard_name' => 'Guard',
    'permissions' => 'Permessi',
    'users_count' => 'Numero Utenti',
    'created_at' => 'Data Creazione',
    'updated_at' => 'Ultima Modifica',
    'description' => 'Descrizione',
  ),
  'roles' => 
  array (
    'super_admin' => 'Super Amministratore',
    'admin' => 'Amministratore',
    'manager' => 'Manager',
    'editor' => 'Editor',
    'user' => 'Utente',
  ),
  'actions' => 
  array (
    'create' => 'Crea Ruolo',
    'edit' => 'Modifica Ruolo',
    'delete' => 'Elimina Ruolo',
    'assign_permissions' => 'Assegna Permessi',
    'sync_permissions' => 'Sincronizza Permessi',
  ),
  'messages' => 
  array (
    'created' => 'Ruolo creato con successo',
    'updated' => 'Ruolo aggiornato con successo',
    'deleted' => 'Ruolo eliminato con successo',
    'permissions_updated' => 'Permessi aggiornati con successo',
    'cannot_delete_super_admin' => 'Non puoi eliminare il ruolo di Super Amministratore',
    'role_in_use' => 'Non puoi eliminare un ruolo assegnato a degli utenti',
  ),
  'descriptions' => 
  array (
    'super_admin' => 'Accesso completo a tutte le funzionalità',
    'admin' => 'Accesso alla maggior parte delle funzionalità amministrative',
    'manager' => 'Gestione di utenti e contenuti specifici',
    'editor' => 'Modifica e gestione dei contenuti',
    'user' => 'Accesso base alle funzionalità',
  ),
  'permissions_groups' => 
  array (
    'users' => 'Gestione Utenti',
    'roles' => 'Gestione Ruoli',
    'content' => 'Gestione Contenuti',
    'settings' => 'Impostazioni',
    'reports' => 'Report',
  ),
);