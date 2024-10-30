<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Traits\HasXotTable;

class ListRoles extends ListRecords
{
    use HasXotTable;
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

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
