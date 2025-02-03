<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
// use Filament\Forms;
use Modules\User\Filament\Resources\FeatureResource\Pages;
use Modules\User\Models\Feature;
use Modules\Xot\Filament\Resources\XotBaseResource;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeatureResource extends XotBaseResource
{
    protected static ?string $model = Feature::class;

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Name')
                ->placeholder('Enter feature name')
                ->helperText('The name of the feature'),

            TextInput::make('scope')
                ->required()
                ->maxLength(255)
                ->label('Scope')
                ->placeholder('Enter feature scope')
                ->helperText('The scope of the feature (e.g. global, user, team)'),

            TextInput::make('value')
                ->required()
                ->maxLength(255)
                ->label('Value')
                ->placeholder('Enter feature value')
                ->helperText('The value or configuration of the feature'),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }
}
