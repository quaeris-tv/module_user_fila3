<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions as TableActions;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\User;
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
                ->label(__('ID'))->searchable()->sortable(),
            TextColumn::make('name')
                ->label(__('Nome')),
            TextColumn::make('slug')
                ->label(__('Slug'))
                ->default(function($record){
                    $record->generateSlug();
                    $record->save();

                }),
        ];
    }


}
