<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\DeviceResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListDevices extends XotBaseListRecords
{
    protected static string $resource = DeviceResource::class;

    public function getGridTableColumns(): array
    {
        return [
            Stack::make([
                TextColumn::make('id'),
                TextColumn::make('mobile_id'),
                // TextColumn::make('languages'),
                TextColumn::make('device'),
                TextColumn::make('platform'),
                TextColumn::make('browser'),
                TextColumn::make('version'),
                IconColumn::make('is_robot')->boolean(),
                TextColumn::make('robot'),
                IconColumn::make('is_desktop')->boolean(),
                IconColumn::make('is_mobile')->boolean(),
                IconColumn::make('is_tablet')->boolean(),
                IconColumn::make('is_phone')->boolean(),
            ]),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            'type' => TextColumn::make('type'),
            'active' => IconColumn::make('active')
                ->boolean(),
        ];
    }

    /**
     * @return array<\Filament\Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label(''),
            EditAction::make()
                ->label(''),
            DeleteAction::make()
                ->label('')
                ->requiresConfirmation(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    protected function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }

   
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
