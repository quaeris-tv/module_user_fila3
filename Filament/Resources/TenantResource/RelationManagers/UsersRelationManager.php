<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AssociateAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\Xot\Filament\Traits\TransTrait;

class UsersRelationManager extends RelationManager
{
    use TransTrait;

    protected static string $relationship = 'users';
    protected static ?string $recordTitleAttribute = 'name';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label(trans('user::user.fields.name'))
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label(trans('user::user.fields.email'))
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\DateTimePicker::make('email_verified_at')
                ->label(trans('user::user.fields.email_verified_at'))
                ->nullable(),

            Forms\Components\TextInput::make('password')
                ->label(trans('user::user.fields.password'))
                ->password()
                ->required(fn ($context) => 'create' === $context)
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),

            Forms\Components\TextInput::make('password_confirmation')
                ->label(trans('user::user.fields.password_confirmation'))
                ->password()
                ->required(fn ($context) => 'create' === $context)
                ->minLength(8),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('verified')
                    ->label(trans('user::user.filters.verified'))
                    ->query(fn (Builder $query) => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->label(trans('user::user.filters.unverified'))
                    ->query(fn (Builder $query) => $query->whereNull('email_verified_at')),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->defaultSort('created_at', 'desc')
            ->reorderable('sort')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

<<<<<<< HEAD
=======
    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->label(trans('user::user.fields.id'))
                ->sortable()
                ->toggleable(),

            TextColumn::make('name')
                ->label(trans('user::user.fields.name'))
                ->searchable()
                ->sortable()
                ->toggleable(),

            TextColumn::make('email')
                ->label(trans('user::user.fields.email'))
                ->searchable()
                ->sortable()
                ->toggleable(),

            TextColumn::make('email_verified_at')
                ->label(trans('user::user.fields.email_verified_at'))
                ->dateTime()
                ->sortable()
                ->toggleable(),

            TextColumn::make('created_at')
                ->label(trans('user::user.fields.created_at'))
                ->dateTime()
                ->sortable()
                ->toggleable(),

            TextColumn::make('updated_at')
                ->label(trans('user::user.fields.updated_at'))
                ->dateTime()
                ->sortable()
                ->toggleable(),
        ];
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Summary of getTableHeaderActions.
     *
     * @return array<\Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
>>>>>>> d9f7564c (.)
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make()
                ->label(trans('user::user.actions.toggle_layout')),

            CreateAction::make()
                ->label(trans('user::user.actions.create'))
                ->modalHeading(trans('user::user.modals.create.heading'))
                ->modalDescription(trans('user::user.modals.create.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.create.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.create.actions.cancel')),

            AssociateAction::make()
                ->label(trans('user::user.actions.associate'))
                ->modalHeading(trans('user::user.modals.associate.heading'))
                ->modalDescription(trans('user::user.modals.associate.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.associate.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.associate.actions.cancel')),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label(trans('user::user.actions.edit'))
                ->modalHeading(trans('user::user.modals.edit.heading'))
                ->modalDescription(trans('user::user.modals.edit.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.edit.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.edit.actions.cancel')),

            DeleteAction::make()
                ->label(trans('user::user.actions.delete'))
                ->modalHeading(trans('user::user.modals.delete.heading'))
                ->modalDescription(trans('user::user.modals.delete.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.delete.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.delete.actions.cancel')),

            DetachAction::make()
                ->label(trans('user::user.actions.detach'))
                ->modalHeading(trans('user::user.modals.detach.heading'))
                ->modalDescription(trans('user::user.modals.detach.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.detach.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.detach.actions.cancel')),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->label(trans('user::user.actions.bulk_delete'))
                ->modalHeading(trans('user::user.modals.bulk_delete.heading'))
                ->modalDescription(trans('user::user.modals.bulk_delete.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.bulk_delete.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.bulk_delete.actions.cancel')),

            DetachBulkAction::make()
                ->label(trans('user::user.actions.bulk_detach'))
                ->modalHeading(trans('user::user.modals.bulk_detach.heading'))
                ->modalDescription(trans('user::user.modals.bulk_detach.description'))
                ->modalSubmitActionLabel(trans('user::user.modals.bulk_detach.actions.submit'))
                ->modalCancelActionLabel(trans('user::user.modals.bulk_detach.actions.cancel')),
        ];
    }
}
