<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;

class TeamsRelationManager extends XotBaseRelationManager
{
<<<<<<< HEAD:app/Filament/Resources/UserResource/RelationManagers/TeamsRelationManager.php
=======
    use HasXotTable;

>>>>>>> 96f269357d1a785a36860a85f377f9e5c58e50b8:App_/App/Filament/Resources/UserResource/RelationManagers/TeamsRelationManager.php
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string $resource = TeamResource::class;
}
