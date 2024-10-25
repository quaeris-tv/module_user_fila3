<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Class UsersRelationManager.
 *
 * Manages the relationship between roles and users with enhanced functionality and strict typing.
 */
final class UsersRelationManager extends RelationManager
{
    use TransTrait;

    protected static string $relationship = 'users';
    protected static ?string $inverseRelationship = 'roles'; // The inverse relationship
    protected static ?string $recordTitleAttribute = 'name'; // The attribute used for record titles

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST; // Set the layout view to LIST

    /**
     * Define the form structure for this relation.
     *
     * @param Form $form The form instance to configure
     *
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

    /**
     * Configure the form schema for the user resource.
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            // Add other fields as needed
        ];
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
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

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
     * Get header actions for the table.
     *
     * @return array<int, Action|ActionGroup>
     */
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
            Tables\Actions\AssociateAction::make()
                ->label('') // Empty label
                ->icon('heroicon-o-link')
                ->tooltip(__('user::actions.associate_user')),
            Tables\Actions\AttachAction::make()
                ->label('') // Empty label
                ->icon('heroicon-o-paper-clip')
                ->tooltip(__('user::actions.attach_user')),
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
                ->label('') // Empty label
                ->tooltip(__('user::actions.view'))
                ->icon('heroicon-o-eye')
                ->color('info'),

            EditAction::make()
                ->label('') // Empty label
                ->tooltip(__('user::actions.edit'))
                ->icon('heroicon-o-pencil')
                ->color('warning'),

            Tables\Actions\DetachAction::make()
                ->label('') // Empty label
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
            'bulk_delete' => DeleteBulkAction::make()
                ->label('') // Empty label
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
                    Forms\Components\DatePicker::make('created_from'),
                    Forms\Components\DatePicker::make('created_until'),
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
    }
}
