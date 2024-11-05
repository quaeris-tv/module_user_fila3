<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Filament\Resources\Pages\ListRecords;
=======
use Filament\Actions;
<<<<<<< HEAD
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions as TableActions;
=======
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
>>>>>>> 40ffc2cc (.)
use Filament\Tables\Columns\Layout\Stack;
>>>>>>> d8e5d862 (🔧 (ListTenants.php): Fix import paths for Filament Actions and Tables to resolve conflicts and improve code readability)
use Filament\Tables\Columns\TextColumn;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Traits\HasXotTable;

class ListTenants extends ListRecords
{
    use HasXotTable;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = TenantResource::class;

<<<<<<< HEAD
    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
=======
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        $tenantModel = static::getModel();

        // Check if the table exists
        if (empty($tenantModel) || ! app($tenantModel)->getConnection()->getSchemaBuilder()->hasTable(app($tenantModel)->getTable())) {
            Notification::make()
            ->title(__('Attenzione'))
            ->body(__('La tabella :table non esiste', ['table' => app($tenantModel)->getTable()]))
            ->persistent()
            ->warning()
            ->send();

            return $this->configureEmptyTable($table);
        }

        return $this->configureTable($table);
    }

    protected function configureEmptyTable(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => User::query()->where('id', null))
            ->columns([
                TextColumn::make('message')
                    ->label(__('Messaggio'))
                    ->default(__('La tabella tenants non è stata impostata. Per favore, configurala.'))
                    ->html(), // This allows you to format the message if needed
            ])
            ->headerActions([]) // No actions
            ->actions([]); // No footer actions
    }

    protected function configureTable(Table $table): Table
    {
        return $table
        ->columns($this->layoutView->getTableColumns())
        ->contentGrid($this->layoutView->getTableContentGrid())
        ->headerActions($this->getTableHeaderActions())

        ->filters($this->getTableFilters())
        ->filtersLayout(FiltersLayout::AboveContent)
        ->persistFiltersInSession()
        ->actions($this->getTableActions())
        ->bulkActions($this->getTableBulkActions())
        ->actionsPosition(ActionsPosition::BeforeColumns)
        ->defaultSort(
            column: 'created_at',
            direction: 'DESC',
        );
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    protected function getListTableColumns(): array
    {
        return [
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
            ViewAction::make(),
            EditAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }

    public function table(Table $table): Table
    {
        $tenantModel = static::getModel();

        // Check if the table exists
        if (empty($tenantModel) || ! app($tenantModel)->getConnection()->getSchemaBuilder()->hasTable(app($tenantModel)->getTable())) {
            Notification::make()
            ->title(__('Attenzione'))
            ->body(__('La tabella :table non esiste', ['table' => app($tenantModel)->getTable()]))
            ->persistent()
            ->warning()
            ->send();

            return $this->configureEmptyTable($table);
        }

        return $this->configureTable($table);
    }

    protected function configureEmptyTable(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => User::query()->where('id', null))
            ->columns([
                TextColumn::make('message')
                    ->label(__('Messaggio'))
                    ->default(__('La tabella tenants non è stata impostata. Per favore, configurala.'))
                    ->html(), // This allows you to format the message if needed
            ])
            ->headerActions([]) // No actions
            ->actions([]); // No footer actions
    }

    protected function configureTable(Table $table): Table
    {
        return $table
        ->columns($this->layoutView->getTableColumns())
        ->contentGrid($this->layoutView->getTableContentGrid())
        ->headerActions($this->getTableHeaderActions())

        ->filters($this->getTableFilters())
        ->filtersLayout(FiltersLayout::AboveContent)
        ->persistFiltersInSession()
        ->actions($this->getTableActions())
        ->bulkActions($this->getTableBulkActions())
        ->actionsPosition(ActionsPosition::BeforeColumns)
        ->defaultSort(
            column: 'created_at',
            direction: 'DESC',
        );
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

>>>>>>> d8e5d862 (🔧 (ListTenants.php): Fix import paths for Filament Actions and Tables to resolve conflicts and improve code readability)
    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->label(__('user::fields.id.label'))
                ->searchable()
                ->sortable(),

            TextColumn::make('name')
                ->label(__('user::fields.name.label'))
                ->searchable(),

            TextColumn::make('slug')
                ->label(__('user::fields.slug.label'))
                ->default(function ($record) {
                    $record->slug = $record->generateSlug();
                    $record->save();

                    return $record->slug;
                })
                ->sortable(),
        ];
    }
}
