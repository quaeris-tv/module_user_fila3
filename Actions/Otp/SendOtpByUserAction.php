<?php

namespace Modules\User\Actions\Otp;


use Illuminate\Support\Str;
use Modules\User\Models\User;
use Illuminate\Support\Carbon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
use Modules\User\Notifications\Auth\Otp;
use Modules\Xot\Filament\Traits\TransTrait;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Support\Facades\Notification;
use Modules\User\Actions\Otp\Traits\OtpTrait;
use Filament\Notifications\Notification as FilamentNotification;

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
