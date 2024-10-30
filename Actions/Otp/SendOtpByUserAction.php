<?php

declare(strict_types=1);

namespace Modules\User\Actions\Otp;

use Filament\Notifications\Notification as FilamentNotification;
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
     * Send a one-time password (OTP) to the user via email.
     *
     * @param UserContract $user
     */
    public function execute(UserContract $user): void
    {
        $passwordData = PasswordData::make();
        $temporaryPassword = Str::random(12);
        $expirationTime = Carbon::now()->addMinutes($passwordData->otp_expiration_minutes);

        $this->updateUserWithTemporaryPassword($user, $temporaryPassword, $expirationTime);
        $this->sendOtpNotification($user, $temporaryPassword);
        $this->sendFilamentNotification();
    }

    /**
     * Update user with temporary password and OTP expiration.
     *
     * @param UserContract $user
     * @param string $temporaryPassword
     * @param Carbon $expirationTime
     */
    private function updateUserWithTemporaryPassword(UserContract $user, string $temporaryPassword, Carbon $expirationTime): void
    {
        $user->update([
            'password' => Hash::make($temporaryPassword),
            'is_otp' => true,
            'password_expires_at' => $expirationTime,
        ]);
    }

    /**
     * Send OTP notification via email.
     *
     * @param UserContract $user
     * @param string $temporaryPassword
     */
    private function sendOtpNotification(UserContract $user, string $temporaryPassword): void
    {
        Notification::route('mail', $user->email)
            ->notify(new Otp($user, $temporaryPassword));
    }

    /**
     * Send a success notification through Filament.
     */
    private function sendFilamentNotification(): void
    {
        FilamentNotification::make()
            ->title(__('user::otp.actions.send_otp_success'))
            ->success()
            ->send();
    }
}
