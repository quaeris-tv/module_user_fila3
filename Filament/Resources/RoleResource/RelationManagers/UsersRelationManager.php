<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

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
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Class UsersRelationManager.
 *
 * Manages the relationship between roles and users with enhanced functionality and strict typing.
 */
final class UsersRelationManager extends RelationManager
{
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

    /**
     * Define the form structure for this relation.
     *
     * @param Form $form The form instance to configure
     *
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
        return $this->getUserResourceForm($form);
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
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
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
            ActionGroup::make([
                AttachAction::make()
                    ->label('')
                    ->tooltip(__('user::actions.attach_user'))
                    ->icon('heroicon-o-link')
                    ->color('primary'),

                AssociateAction::make()
                    ->label('')
                    ->tooltip(__('user::actions.associate_user'))
                    ->icon('heroicon-o-user-plus')
                    ->color('success'),
            ])->tooltip(__('user::actions.user_actions')),
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
            ActionGroup::make([
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
            ])->tooltip(__('user::actions.row_actions')),
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
                }),
        ];
    }
}
