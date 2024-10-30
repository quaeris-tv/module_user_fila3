<?php

declare(strict_types=1);

namespace Modules\User\Actions\Otp;

use Filament\Notifications\Notification as FilamentNotification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Datas\PasswordData;
use Modules\User\Notifications\Auth\Otp;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

class SendOtpByUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(UserContract $user): void
    {
        $pwd = PasswordData::make();
        $temporaryPassword = Str::random(12);
        $expirationTime = Carbon::now()->addMinutes($pwd->otp_expiration_minutes);
        $user->update([
            'password' => Hash::make($temporaryPassword),
            'is_otp' => true,
            'password_expires_at' => $expirationTime,
        ]);

        Notification::route('mail', $user->email)
            ->notify(new Otp($user, $temporaryPassword));

        FilamentNotification::make()
            ->title(trans('user::otp.actions.send_otp_success'))
            ->success()
            ->send();
    }
}
