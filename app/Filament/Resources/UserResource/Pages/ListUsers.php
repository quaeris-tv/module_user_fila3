<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Password;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListUsers extends XotBaseListRecords
{
    // //
    protected static string $resource = UserResource::class;

    /**
     * @return array<string, \Filament\Tables\Columns\TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')
                ->searchable(),
            'email' => TextColumn::make('email')
                ->searchable(),
            'email_verified_at' => TextColumn::make('email_verified_at')
                ->dateTime(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime(),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            /*
        SelectFilter::make('role')
            ->options([
                Role::ROLE_USER => 'User',
                Role::ROLE_OWNER => 'Owner',
                Role::ROLE_ADMINISTRATOR => 'Administrator',
            ])
            ->attribute('role_id'),
        */
            Filter::make('verified')

                ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            Filter::make('unverified')

                ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            ChangePasswordAction::make()
                ->label('')
                ->tooltip('Cambio Password')
                ->iconButton(),
            ...parent::getTableActions(),
            /*
        Action::make('changePassword')
            ->action(function (UserContract $user, array $data): void {
                $user->update([
                    'password' => Hash::make($data['new_password']),
                ]);
                Notification::make()->success()->title('Password changed successfully.');
            })
            ->form([
                TextInput::make('new_password')
                    ->password()
                    ->required()
                    ->rule(Password::default()),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                    ->same('new_password'),
            ])
            ->icon('heroicon-o-key')
        // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
        ,
        */

            Action::make('deactivate')
                ->tooltip(__('filament-actions::delete.single.label'))
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->action(static fn (UserContract $user) => $user->delete())
            // ->iconButton()
            // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
            ,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    protected function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
            'export' => Tables\Actions\BulkAction::make('export')
                ->action(fn (Collection $records) => $this->export($records)),
        ];
    }
}
