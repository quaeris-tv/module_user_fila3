<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Modules\User\Models\Role;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Pages\XotBaseListRecords;

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
}
