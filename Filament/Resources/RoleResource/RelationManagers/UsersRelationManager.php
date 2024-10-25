<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

<<<<<<< HEAD
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\AssociateAction;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
>>>>>>> origin/dev
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers; // Import the TableLayoutEnum
use Modules\Xot\Filament\Traits\TransTrait; // Ensure you have the correct namespace for TransTrait
=======
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> origin/dev

/**
 * Class UsersRelationManager.
 *
 * Manages the relationship between roles and users with enhanced functionality and strict typing.
 */
final class UsersRelationManager extends RelationManager
{
<<<<<<< HEAD
    use TransTrait; // Include the TransTrait

    protected static string $relationship = 'users';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST; // Set the layout view to LIST
=======
    use TransTrait;

    /**
     * @var TableLayoutEnum Current table layout view
     */
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    /**
     * @var string The relationship being managed
     */
    protected static string $relationship = 'users';

    /**
     * @var string|null The inverse relationship
     */
    protected static ?string $inverseRelationship = 'roles';

    /**
     * @var string|null The attribute used for record titles
     */
    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> origin/dev

    /**
     * Define the form structure for this relation.
     *
     * @param Form $form The form instance to configure
     *
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema($this->getFormSchema());
=======
        return $this->getUserResourceForm($form);
>>>>>>> origin/dev
    }

    /**
     * Configure the form using UserResource for consistency.
     *
     * @param Form $form The form instance to configure
     *
     * @return Form The configured form
     */
    protected function getUserResourceForm(Form $form): Form
    {
        return UserResource::form($form);
    }

    /**
     * Configure the table structure and behavior.
     *
     * @param Table $table The table instance to configure
     *
     * @return Table The configured table
     */
    public function table(Table $table): Table
    {
        return $table
<<<<<<< HEAD
            // ->columns($this->getTableColumns())
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())

            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
=======
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
>>>>>>> origin/dev
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
    }

=======
            ->defaultSort('users.created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('60s');
    }

    /**
     * Get table columns for grid layout.
     *
     * @return array<int, Stack>
     */
>>>>>>> origin/dev
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

<<<<<<< HEAD
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
=======
    /**
     * Get table columns for list layout.
     *
     * @return array<int, TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label(__('user::fields.name'))
                ->searchable()
                ->sortable()
                ->tooltip(fn (Model $record): string => "{$record->name}")
                ->copyable(),

            TextColumn::make('email')
                ->label(__('user::fields.email'))
                ->searchable()
                ->sortable()
                ->tooltip(fn (Model $record): string => "{$record->email}")
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
     * Get header actions for the table.
     *
     * @return array<int, Action|ActionGroup>
     */
    protected function getTableHeaderActions(): array
    {
        return [
            AttachAction::make()
                ->label('')
                ->tooltip(__('user::actions.attach_user'))
                ->icon('heroicon-o-link')
                ->color('primary'),
            /*
            AssociateAction::make()
                ->label('')
                ->tooltip(__('user::actions.associate_user'))
                ->icon('heroicon-o-user-plus')
                ->color('success'),
            */
        ];
    }

    /**
     * Get row-level actions for the table.
     *
     * @return array<int, Action|ActionGroup>
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

            DetachAction::make()
                ->label('')
                ->tooltip(__('user::actions.detach'))
                ->icon('heroicon-o-link-slash')
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

    /**
     * Get bulk actions for the table.
     *
     * @return array<string, BulkAction>
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
     * Get filters for the table.
     *
     * @return array<int, Filter>
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
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
                ->columns(2),
        ];
>>>>>>> origin/dev
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
