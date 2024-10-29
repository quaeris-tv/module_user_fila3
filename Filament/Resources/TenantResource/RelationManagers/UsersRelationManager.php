<?php

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions as TableActions;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Resources\RelationManagers\RelationManager;

class UsersRelationManager extends RelationManager
{
    use HasXotTable;

    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label(__('user::attributes.name'))
                ->sortable()
                ->searchable(),
            TextColumn::make('email')
                ->label(__('user::attributes.email'))
                ->sortable()
                ->searchable(),
            TextColumn::make('created_at')
                ->label(__('user::attributes.created_at'))
                ->date()
                ->sortable(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('user::attributes.name'))
                ->required(),
            TextInput::make('email')
                ->label(__('user::attributes.email'))
                ->required()
                ->email(),
        ];
    }
}
