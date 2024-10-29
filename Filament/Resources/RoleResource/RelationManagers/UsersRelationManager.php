<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
<<<<<<< HEAD
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
=======
<<<<<<< HEAD
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
<<<<<<< HEAD
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
=======
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource;
>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
use Modules\Xot\Filament\Traits\TransTrait;

final class UsersRelationManager extends RelationManager
{
    use TransTrait;

    protected static string $relationship = 'users';
    protected static ?string $inverseRelationship = 'roles';
    protected static ?string $recordTitleAttribute = 'name';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

<<<<<<< HEAD
=======
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

>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
    /**
     * Define the form structure.
     */
    public function form(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema($this->getFormSchema());
=======
<<<<<<< HEAD
        return $this->getUserResourceForm($form);
>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
    }

    /**
     * Configure the form schema.
     */
    protected function getFormSchema(): array
    {
<<<<<<< HEAD
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            // Additional fields as needed
        ];
=======
        // Centralize form structure using UserResource for consistency
        return UserResource::form($form);
=======
        return $form->schema($this->getFormSchema());
>>>>>>> 1279b1d4 (This code adds several new methods and properties to the `Users` class:)
>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
    }

    /**
     * Configure the table structure and behavior.
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
<<<<<<< HEAD
            ->defaultSort('users.created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('60s');
=======
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
>>>>>>> 2fe2622f (✨ (UsersRelationManager.old): Add UsersRelationManager class to manage relations with users in RoleResource)
    }

    /**
     * Get grid layout columns.
     */
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Get list layout columns.
     */
    public function getListTableColumns(): array
    {
<<<<<<< HEAD
        return [
            TextColumn::make('name')
                ->label(__('user::fields.name'))
                ->searchable()
                ->sortable()
                ->copyable(),

            TextColumn::make('email')
                ->label(__('user::fields.email'))
                ->searchable()
                ->sortable()
                ->copyable(),

            TextColumn::make('created_at')
                ->label(__('user::fields.created_at'))
                ->dateTime()
                ->sortable()
                ->toggleable(),

            TextColumn::make('updated_at')
                ->label(__('user::fields.updated_at'))
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * Get header actions.
     */
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
            Tables\Actions\AssociateAction::make()
                ->label('')
                ->icon('heroicon-o-link')
                ->tooltip(__('user::actions.associate_user')),
            Tables\Actions\AttachAction::make()
                ->label('')
                ->icon('heroicon-o-paper-clip')
                ->tooltip(__('user::actions.attach_user')),
        ];
    }

    /**
     * Get row-level actions.
     */
    protected function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label('')
                ->tooltip(__('user::actions.view'))
                ->icon('heroicon-o-eye')
                ->color('info'),

            EditAction::make()
                ->label('')
                ->tooltip(__('user::actions.edit'))
                ->icon('heroicon-o-pencil')
                ->color('warning'),

            Tables\Actions\DetachAction::make()
                ->label('')
                ->tooltip(__('user::actions.detach'))
                ->icon('heroicon-o-link-slash')
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

    /**
     * Get bulk actions.
     */
    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->label('')
                ->tooltip(__('user::actions.delete_selected'))
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

    /**
     * Get filters.
     */
    protected function getTableFilters(): array
    {
        return [
            Filter::make('active')
                ->label(__('user::filters.active_users'))
                ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                ->toggle(),

            Filter::make('created_at')
                ->label(__('user::filters.creation_date'))
                ->form([
                    Forms\Components\DatePicker::make('created_from'),
                    Forms\Components\DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['created_from'], fn (Builder $query, $date) => $query->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn (Builder $query, $date) => $query->whereDate('created_at', '<=', $date));
                })
                ->columns(2),
        ];
    }

    // public function getTableFilters(): array
    // {
    //     return [
    //     ];
    // }

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

    // protected function getTableHeaderActions(): array
    // {
    //     return [
    //         TableLayoutToggleTableAction::make(),
    //         Tables\Actions\AssociateAction::make()
    //             ->label('') // Empty label
    //             ->icon('heroicon-o-link')
    //             ->tooltip(__('Associate User')), // Move label to tooltip
    //         Tables\Actions\AttachAction::make()
    //             ->label('') // Empty label
    //             ->icon('heroicon-o-paper-clip')
    //             ->tooltip(__('Attach User')), // Move label to tooltip
    //     ];
    // }

    // protected function getTableActions(): array
    // {
    //     return [
    //         EditAction::make()
    //             ->label('') // Empty label
    //             ->tooltip(__('Edit')), // Move label to tooltip
    //         DeleteAction::make()
    //             ->label('') // Empty label
    //             ->tooltip(__('Delete')), // Move label to tooltip
    //     ];
    // }

    protected function getBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->label('') // Empty label
                ->tooltip(__('Delete Selected')), // Move label to tooltip
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
