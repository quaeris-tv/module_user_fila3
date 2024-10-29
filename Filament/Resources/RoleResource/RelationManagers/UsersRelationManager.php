<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;

final class UsersRelationManager extends RelationManager
{
    use TransTrait;
    use HasXotTable;

    protected static string $relationship = 'users';
    protected static ?string $inverseRelationship = 'roles';
    protected static ?string $recordTitleAttribute = 'name';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    /**
     * Define the form structure.
     */
    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

    /**
     * Configure the form schema.
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            // Additional fields as needed
        ];
    }

    /**
     * Get list layout columns.
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
<<<<<<< HEAD
=======

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
    }
>>>>>>> eacae92a (fix(ListTenants): remove unused code and methods to improve maintainability and readability)
}
