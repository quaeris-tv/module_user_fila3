<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ProfileResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\ProfileResource;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
}
