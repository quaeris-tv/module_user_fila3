<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Traits\HasXotTable;

class ListTenants extends ListRecords
{
    use HasXotTable;
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = TenantResource::class;

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
              ->label(__('user::fields.id.label'))
              ->searchable()
              ->sortable(),
            TextColumn::make('name')
              ->label(__('user::fields.name.label')),
            TextColumn::make('slug')
                ->label(__('user::fields.slug.label')),
                ->default(function ($record) {
                    $record->generateSlug();
                    $record->save();
                }),
        ];
    }
}
