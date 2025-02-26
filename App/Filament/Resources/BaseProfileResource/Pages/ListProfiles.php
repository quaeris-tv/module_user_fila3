<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * .
 */
class ListProfiles extends XotBaseListRecords
{
    protected static string $resource = BaseProfileResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'user.name' => TextColumn::make('user.name')
                ->sortable()
                ->searchable()
                ->default(
                    function ($record) {
                        $user = $record->user;
                        $user_class = XotData::make()->getUserClass();
                        if (null === $user) {
                            if (null == $record->email) {
                                $record->update(['email' => fake()->email()]);
                            }
                            try {
                                /** @var \Modules\Xot\Contracts\UserContract */
                                $user = XotData::make()->getUserByEmail($record->email);
                            } catch (\Exception $e) {
                                return '--';
                            }
                        }
                        if (null === $user) {
                            $data = $record->toArray();
                            $user_data = Arr::except($data, ['id']);
                            /** @var \Modules\Xot\Contracts\UserContract */
                            $user = $user_class::create($user_data);
                        }
                        $record->update(['user_id' => $user->id]);

                        return $user->name;
                    }
                ),
            'first_name' => TextColumn::make('first_name')
                ->sortable()
                ->searchable(),
            'last_name' => TextColumn::make('last_name')
                ->sortable()
                ->searchable(),
            'email' => TextColumn::make('email')
                ->sortable()
                ->searchable(),
            'is_active' => IconColumn::make('is_active')
                ->boolean(),
            'photo' => SpatieMediaLibraryImageColumn::make('photo')
                ->collection('profile'),
        ];
    }

    /**
     * @return array<string, Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'is_active' => TernaryFilter::make('is_active')
                ->placeholder(static::trans('filters.is_active.all'))
                ->trueLabel(static::trans('filters.is_active.active'))
                ->falseLabel(static::trans('filters.is_active.inactive'))
                ->queries(
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
                ),
        ];
    }
}
