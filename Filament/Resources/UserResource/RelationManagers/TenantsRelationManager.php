<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;

/**
 * Manages the relationship between users and tenants.
 *
 * This class provides the form schema and table configuration for the "tenants" relationship
 * with strong typing and enhanced structure for stability and professionalism.
 */
final class TenantsRelationManager extends RelationManager
{
    use HasXotTable;
    protected static string $relationship = 'tenants';
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    /**
     * Set up the form schema for tenant relations.
     *
     * @param Form $form the form instance for configuration
     *
     * @return Form configured form instance
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('user::fields.name'))
                    ->required()
                    ->maxLength(255),
            ]);
    }



    /**
     * Define table columns for displaying tenant information.
     *
     * @return array<int, TextColumn> configured table columns
     */
    public function getListTableColumns(): array
    {
        return app(ListTenants::class)->getListTableColumns();

    }

}
