<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * --.
 */
class ListSocialProviders extends XotBaseListRecords
{
    protected static string $resource = SocialProviderResource::class;

    /**
     * @return array<string, Column>
     */
    public function getGridTableColumns(): array
    {
        return [
            'icon' => IconColumn::make('icon'),
            'name' => TextColumn::make('name'),
            'view' => ViewColumn::make('custom_view')
                ->view('social-provider.column'),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'active' => IconColumn::make('active')
                ->boolean()
                ->sortable(),
            'stateless' => IconColumn::make('stateless')
                ->boolean()
                ->sortable(),
            'socialite' => IconColumn::make('socialite')
                ->boolean()
                ->sortable(),
            'scopes' => TextColumn::make('scopes')
                ->searchable()
                ->wrap(),
            'parameters' => TextColumn::make('parameters')
                ->searchable()
                ->wrap(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            \Filament\Tables\Filters\SelectFilter::make('active')
                ->options([
                    true => 'Active',
                    false => 'Inactive',
                ]),
        ];
    }

    /**
     * @return array<\Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }
}
