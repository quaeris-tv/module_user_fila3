<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;

/**
 * Manages the relationship between users and tenants.
 *
 * This class provides the form schema and table configuration for the "tenants" relationship
 * with strong typing and enhanced structure for stability and professionalism.
 */
class TenantsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tenants';

    protected static ?string $recordTitleAttribute = 'name';
    protected static string $resource = TenantResource::class;

<<<<<<< HEAD
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

                    ->required()
                    ->maxLength(255),
            ]);
    }

    /**
=======
    /*
>>>>>>> origin/dev
     * Define table columns for displaying tenant information.
     *
     * @return array<string, \Filament\Tables\Columns\Column> configured table columns
     */
    // public function getListTableColumns(): array
    // {
    //    return app(ListTenants::class)->getListTableColumns();
    // }
}
