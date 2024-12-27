<?php

declare(strict_types=1);

/**
 * @see https://github.com/savannabits/filament-tenancy-starter/blob/main/app/Filament/resources/TenantResource.php
 */

namespace Modules\User\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\EditTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\User\Filament\Resources\TenantResource\Pages\ViewTenant;
use Modules\User\Filament\Resources\TenantResource\RelationManagers;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\XotBaseResource;

class TenantResource extends XotBaseResource
{
    // protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getModel(): string
    {
        $xot = XotData::make();

        $model = $xot->getTenantClass();

        return $model;
    }

    public static function form(Form $form): Form
    {
        $resource = XotData::make()->getTenantResourceClass();

        return app($resource)->form($form);
        /*
        return $form
            ->schema(
                [
                    Forms\Components\Section::make(
                        [
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->unique(table: 'tenants', ignoreRecord: true)->live(onBlur: true)
                                ->afterStateUpdated(
                                    static function (Forms\Set $set, $state): void {
                                        $set('id', $slug = \Str::of($state)->slug('_')->toString());
                                        $set('domain', \Str::of($state)->slug()->toString());
                                    }
                                )->columnSpanFull(),
                            Forms\Components\TextInput::make('id')
                                ->required()
                                ->disabled(static fn ($context) => 'create' !== $context)
                                ->unique(table: 'tenants', ignoreRecord: true),
                            Forms\Components\TextInput::make('domain')
                                ->required()
                                ->visible(static fn ($context) => 'create' === $context)
                                ->unique(table: 'domains', ignoreRecord: true)
                                ->prefix('https://')
                                ->suffix('.'.request()->getHost()),
                            Forms\Components\TextInput::make('email')->email(),
                            Forms\Components\TextInput::make('phone')->tel(),
                            Forms\Components\TextInput::make('mobile')->tel(),
                            Forms\Components\ColorPicker::make('primary_color'),
                            Forms\Components\ColorPicker::make('secondary_color'),
                        ]
                    )->columns(),
                ]
            );
        */
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\DomainsRelationManager::class,
            RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTenants::route('/'),
            'create' => CreateTenant::route('/create'),
            'view' => ViewTenant::route('/{record}'),
            'edit' => EditTenant::route('/{record}/edit'),
        ];
    }
}
