<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers; // Import the TableLayoutEnum
use Modules\Xot\Filament\Traits\TransTrait; // Ensure you have the correct namespace for TransTrait

class UsersRelationManager extends RelationManager
{
    use TransTrait; // Include the TransTrait

    protected static string $relationship = 'users';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST; // Set the layout view to LIST

    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

    public function table(Table $table): Table
    {
        return $table
            // ->columns($this->getTableColumns())
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
                column: 'users.created_at',
                direction: 'DESC',
            )
        ;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            // Add other fields as needed
        ];
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    public function getListTableColumns(): array
    {
        return app(ListUsers::class)->getListTableColumns();
        /*
        return [
            TextColumn::make('name')
                ->label(__('Name')), // Use translations for labels
            // Add more columns as necessary
        ];
        */
    }

    public function getTableFilters(): array
    {
        return [
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
                ->label('') // Empty label
                ->tooltip(__('Create User')), // Move label to tooltip
            Tables\Actions\AssociateAction::make()
                ->label('') // Empty label
                ->tooltip(__('Associate User')), // Move label to tooltip
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label('') // Empty label
                ->tooltip(__('Edit')), // Move label to tooltip
            DeleteAction::make()
                ->label('') // Empty label
                ->tooltip(__('Delete')), // Move label to tooltip
        ];
    }

    protected function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->label('') // Empty label
                ->tooltip(__('Delete Selected')), // Move label to tooltip
        ];
    }
}
