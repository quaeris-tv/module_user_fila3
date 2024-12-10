<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Form;
// use Filament\Forms;
use Modules\User\Filament\Resources\FeatureResource\Pages;
use Modules\User\Models\Feature;
use Modules\Xot\Filament\Resources\XotBaseResource;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeatureResource extends XotBaseResource
{
    protected static ?string $model = Feature::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
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
