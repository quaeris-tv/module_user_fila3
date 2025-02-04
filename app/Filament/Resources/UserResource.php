<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Resources\UserResource\Pages;
use Modules\User\Filament\Resources\UserResource\RelationManagers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = \Modules\Xot\Datas\XotData::make()->getUserClass();

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Static property Modules\User\Filament\Resources\UserResource::$enablePasswordUpdates is never read, only written.
    // private static bool|\Closure $enablePasswordUpdates = true;

    public static function getWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    // public static function extendForm(\Closure $callback): void
    // {
    //    static::$extendFormCallback = $callback;
    // }

    public static function getFormSchema(): array
    {
        // dddx([
        //     $form->model->teams,
        //     $form->model->currentTeam
        // ]);
        $schema = [
            'left' => Section::make(
                [
                    'name' => TextInput::make('name')
                        ->required(),
                    'email' => TextInput::make('email')
                        ->required()
                        ->unique(ignoreRecord: true),
                    /*
                    'current_team_id' => Select::make('current_team_id')
                        ->relationship('teams', 'name'),
                    */
                    /*
                'password' => TextInput::make('password')
                    ->required()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->rule(Password::default()),
                */
                    /*------------
                    'password' => TextInput::make('password')
                        //
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(
                            static fn ($state) => ! empty($state)
                            ? Hash::make($state)
                            : User::find($form->getColumns())?->password
                        ),
                        */
                    /*
                    ->dehydrateStateUsing(function ($state) use ($form){
                        if(!empty($state)){
                            return Hash::make($state);
                        }

                        $user_class=\Modules\Xot\Datas\XotData::make()->getUserClass();
                        //var \Modules\Xot\Contracts\UserContract
                        $user = $user_class::find($form->getColumns());
                        if($user){
                            return $user->password;
                        }
                    }),
                    */

                    //    ->visible(fn ($livewire): bool => $livewire instanceof CreateUser)
                    //    ->rule(Password::default()),
                    /*
                        'password_group' => Group::make([
                    'password' => TextInput::make('password')
                        ->password()
                        ->nullable()
                        ->rule(Password::default())
                        ->dehydrated(false),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->password()
                        ->rule('required', fn ($get): bool => (bool) $get('password'))
                        ->same('password')
                        ->dehydrated(false),
                        ])// ->visible(static::$enablePasswordUpdates),
                        */
                ]
            )->columnSpan(8),
            'right' => Section::make(
                [
                    'created_at' => Placeholder::make('created_at')
                        ->content(static fn ($record) => $record?->created_at?->diffForHumans() ?? new HtmlString('&mdash;')),
                ]
            )->columnSpan(4),
        ];

        // $form->schema($schema)->columns(12);

        return $schema;
    }

    /**
     * @return array<int, class-string<RelationManager>|RelationGroup>
     */
    public static function getRelations(): array
    {
        return [
            'teams' => RelationManagers\TeamsRelationManager::class,
            'tenants' => RelationManagers\TenantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // public static function enablePasswordUpdates(bool|Closure $condition = true): void
    // {
    //     static::$enablePasswordUpdates = $condition;
    // }

    /*
    public static function getModel(): string
    {
        return config('filament-user-resource.model');
    }
    */

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
