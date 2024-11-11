<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

use Illuminate\Support\Str;
use Modules\User\Models\User;
use Illuminate\Support\Carbon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\User\Notifications\Auth\Otp;
use Modules\Xot\Filament\Traits\TransTrait;
use Illuminate\Support\Facades\Notification;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Filament\Notifications\Notification as FilamentNotification;


class SendOtpAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->tooltip(trans('user::otp.actions.send_otp'))
            ->icon('heroicon-o-key')
            ->action(function (User $record)  {
                app(SendOtpByUserAction::class)->execute($record);
            })
            ->requiresConfirmation()
            ->modalHeading(trans('user::otp.actions.send_otp'))
            ->modalSubheading(trans('user::otp.actions.confirm_otp'))
            ->modalButton(trans('user::otp.actions.yes_send_otp'));
    }

    /**
     * Ottieni il nome predefinito dell'azione.
     */
    public static function getDefaultName(): ?string
    {
        return 'send_otp';
    }
}
