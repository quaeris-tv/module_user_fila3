<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
<<<<<<< HEAD
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
=======
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Traits\TransTrait;

class UsersRelationManager extends RelationManager
{
    use TransTrait;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $relationship = 'users';

    protected static ?string $inverseRelationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';
=======
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers; // Import the TableLayoutEnum
use Modules\Xot\Filament\Traits\TransTrait; // Ensure you have the correct namespace for TransTrait

class UsersRelationManager extends RelationManager
{
    use TransTrait; // Include the TransTrait

    protected static string $relationship = 'users';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST; // Set the layout view to LIST
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)

    /**
     * Define the form for this relation.
     */
    public function form(Form $form): Form
    {
<<<<<<< HEAD
        return $this->getUserResourceForm($form);
    }

    /**
     * Modular function to configure the form.
     */
    protected function getUserResourceForm(Form $form): Form
    {
        // Centralize form structure using UserResource for consistency
        return UserResource::form($form);
=======
        return $form->schema($this->getFormSchema());
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)
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
<<<<<<< HEAD
            ->defaultSort(
                column: 'users.created_at',
                direction: 'DESC',
            );
=======

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
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    public function getListTableColumns(): array
    {
<<<<<<< HEAD
        return [
            TextColumn::make('name')
                ->label(__('user.name'))
                ->searchable()
                ->sortable(),
            TextColumn::make('email')
                ->label(__('user.email'))
                ->searchable()
                ->sortable(),
            TextColumn::make('role')
                ->label(__('user.role')),
        ];
    }

    /**
     * Define the header actions in a separate function.
     */
    protected function getTableHeaderActions(): array
    {
        return [
            AttachAction::make()
                ->label('')
                ->tooltip(__('role.attach_user'))
                ->icon('heroicon-o-link')
            // ->icon('heroicon-o-paper-clip')
            ,
        ];
    }

    /**
     * Define the row-level actions in a separate function.
     */
    protected function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label('')
                ->tooltip(__('role.view_user'))
                ->icon('heroicon-o-eye'),
            EditAction::make()
                ->label('')
                ->tooltip(__('role.edit_user'))
                ->icon('heroicon-o-pencil'),
            DetachAction::make()
                ->label('')
                ->tooltip(__('role.detach_user'))
                ->icon('heroicon-o-link-slash'),
        ];
=======
        return app(ListUsers::class)->getListTableColumns();
        /*
        return [
            TextColumn::make('name')
                ->label(__('Name')), // Use translations for labels
            // Add more columns as necessary
        ];
        */
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)
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
            Tables\Actions\AssociateAction::make()
                ->label('') // Empty label
                ->icon('heroicon-o-link')
                ->tooltip(__('Associate User')), // Move label to tooltip
            Tables\Actions\AttachAction::make()
                ->label('') // Empty label
                ->icon('heroicon-o-paper-clip')
                ->tooltip(__('Attach User')), // Move label to tooltip
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
