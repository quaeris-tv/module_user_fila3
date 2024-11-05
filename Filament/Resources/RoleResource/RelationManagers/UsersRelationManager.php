<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
<<<<<<< HEAD
=======
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
<<<<<<< HEAD
use Modules\Xot\Filament\Traits\HasXotTable;
=======
use Modules\User\Filament\Resources\UserResource;
>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
use Modules\Xot\Filament\Traits\TransTrait;

final class UsersRelationManager extends RelationManager
{
    use TransTrait;
    use HasXotTable;

    protected static string $relationship = 'users';
    protected static ?string $inverseRelationship = 'roles';
    protected static ?string $recordTitleAttribute = 'name';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

<<<<<<< HEAD
=======
    protected static string $relationship = 'users';

    protected static ?string $inverseRelationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
    /**
     * Definisce lo schema del form per la relazione users.
     */
    public function form(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema($this->getFormSchema());
=======
        return $this->getUserResourceForm($form);
>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
    }

    /**
     * Restituisce lo schema del form.
     */
<<<<<<< HEAD
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label(__('user::socialite_user.fields.name.label')),
            // Aggiungi altri campi necessari
=======
    protected function getUserResourceForm(Form $form): Form
    {
        // Centralize form structure using UserResource for consistency
        return UserResource::form($form);
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
            );
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
        ];
    }

    /**
     * Definisce le colonne della tabella in layout lista.
     */
    public function getListTableColumns(): array
    {
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
     * Definisce i filtri disponibili nella tabella.
     */
    protected function getTableFilters(): array
    {
        return [
            Filter::make('active')
                ->label(__('user::filters.active_users'))
                ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                ->toggle(),

<<<<<<< HEAD
            Filter::make('created_at')
                ->label(__('user::filters.creation_date'))
                ->form([
                    Forms\Components\DatePicker::make('created_from')->label(__('user::filters.created_from')),
                    Forms\Components\DatePicker::make('created_until')->label(__('user::filters.created_until')),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['created_from'], fn (Builder $query, $date) => $query->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn (Builder $query, $date) => $query->whereDate('created_at', '<=', $date));
                })
                ->columns(2),
=======
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
>>>>>>> 3b22a638 (🔧 (UsersRelationManager.php): Remove unnecessary code related to Filament Tables and Actions)
        ];
    }
}
