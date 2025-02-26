<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ProfileResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Resources\ProfileResource;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;
}
