<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->searchable()
                ->sortable(),

            TextColumn::make('name')
                ->searchable(),

            TextColumn::make('slug')
                ->default(function ($record) {
                    $record->generateSlug();
                    $slug = Str::slug($record->name);
                    $record->slug = $slug;
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [];
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
