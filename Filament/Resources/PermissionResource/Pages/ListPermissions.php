<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Webmozart\Assert\Assert;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\BulkAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListPermissions extends XotBaseListRecords
{
 
    protected static string $resource = PermissionResource::class;

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        Assert::classExists($roleModel = config('permission.models.role'));

        return [
            BulkAction::make('Attach Role')
                ->action(
                    static function (Collection $collection, array $data): void {
                        foreach ($collection as $record) {
                            Assert::isInstanceOf($record, \Modules\Xot\Datas\XotData::make()->getUserClass(), '['.__LINE__.']['.__CLASS__.']');
                            $record->roles()->sync($data['role']);
                            $record->save();
                        }
                    }
                )
                ->form(
                    [
                        Select::make('role')
                            ->label(__('filament-spatie-roles-permissions::filament-spatie.field.role'))
                            ->options($roleModel::query()->pluck('name', 'id'))
                            ->required(),
                    ]
                )->deselectRecordsAfterCompletion(),
        ];
    }
}
