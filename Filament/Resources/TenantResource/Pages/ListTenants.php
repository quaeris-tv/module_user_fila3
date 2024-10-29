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
<<<<<<< HEAD
            TextColumn::make('id')->label(__('user::fields.id.label'))->searchable()->sortable(),
            TextColumn::make('name')->label(__('user::fields.name.label')),
=======
            TextColumn::make('id')->label(__('ID'))->searchable()->sortable(),
            TextColumn::make('name')->label(__('Nome')),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            // Your filters here
        ];
    }

    protected function getTableActions(): array
    {
        return [
            TableActions\ViewAction::make(),
            TableActions\EditAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            TableActions\DeleteBulkAction::make(),
>>>>>>> eacae92a (fix(ListTenants): remove unused code and methods to improve maintainability and readability)
        ];
    }
}
