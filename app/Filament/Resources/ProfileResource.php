<?php

namespace Modules\User\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\User\Models\Profile;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\User\Filament\Resources\ProfileResource\Pages;
use Modules\User\Filament\Resources\ProfileResource\RelationManagers;

class ProfileResource extends BaseProfileResource
{
    protected static ?string $model = Profile::class;

    
}
