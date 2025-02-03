<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRoles extends XotBaseListRecords
{
    protected static string $resource = RoleResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')
                ->searchable()
                ->sortable(),
            'team_id' => TextColumn::make('team.name')
                ->searchable()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            \Filament\Tables\Filters\SelectFilter::make('guard_name')
                ->options(fn () => Role::distinct()->pluck('guard_name', 'guard_name')->toArray()),
        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            \Filament\Tables\Actions\DeleteBulkAction::make(),
        ];
    }
}
