<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

<<<<<<< HEAD
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Layout\Stack;
>>>>>>> origin/dev
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers; // Import the TableLayoutEnum
use Modules\Xot\Filament\Traits\TransTrait; // Ensure you have the correct namespace for TransTrait

class UsersRelationManager extends RelationManager
{
    use TransTrait; // Include the TransTrait

    protected static string $relationship = 'users';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST; // Set the layout view to LIST

=======
use Modules\Xot\Filament\Traits\TransTrait;

class UsersRelationManager extends RelationManager
{
    use TransTrait;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Define the form configuration.
     */
>>>>>>> origin/dev
    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

<<<<<<< HEAD
=======
    /**
     * Define the form schema in a separate function.
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label(__('tenant.name'))
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->label(__('tenant.email'))
                ->email()
                ->required()
                ->maxLength(255),
        ];
    }

>>>>>>> origin/dev
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
=======
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
>>>>>>> origin/dev
    }

    public function getGridTableColumns(): array
    {
<<<<<<< HEAD
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
=======
        return [Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Define the table columns in a separate function.
     */
    protected function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label(__('tenant.name'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->label(__('tenant.email'))
                ->searchable()
                ->sortable(),
>>>>>>> origin/dev
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            Tables\Actions\CreateAction::make()
                ->label('') // Empty label
                ->tooltip(__('Create User')), // Move label to tooltip
            Tables\Actions\AssociateAction::make()
                ->label('') // Empty label
                ->tooltip(__('Associate User')), // Move label to tooltip
        ];
    }

=======
            CreateAction::make(),
        ];
    }

    /**
     * Define the header actions in a separate function.
     */
>>>>>>> origin/dev
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
<<<<<<< HEAD
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
=======
            Tables\Actions\CreateAction::make()
                ->label(__('tenant.create_user'))
                ->icon('heroicon-o-plus'),
        ];
    }

    /**
     * Define the row-level actions in a separate function.
     */
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()
                ->label(__('tenant.edit_user'))
                ->icon('heroicon-o-pencil'),
            Tables\Actions\DeleteAction::make()
                ->label(__('tenant.delete_user'))
                ->icon('heroicon-o-trash'),
        ];
    }

    /**
     * Define the bulk actions in a separate function.
     */
    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make()
                ->label(__('tenant.delete_selected'))
                ->icon('heroicon-o-trash'),
>>>>>>> origin/dev
        ];
    }
}
