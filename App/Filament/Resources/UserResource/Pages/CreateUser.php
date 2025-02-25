<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\UserResource;

class CreateUser extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
{
    // //
    protected static string $resource = UserResource::class;
}
