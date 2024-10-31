<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Traits\HasXotTable;

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