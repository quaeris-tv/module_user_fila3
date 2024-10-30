<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

use Illuminate\Validation\Rules\Password;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PasswordData extends Data
{
    public int $otp_expiration_minutes = 60; // Durata in minuti della validità della password temporanea

    public int $otp_length = 6;  // Lunghezza del codice OTP

    public int $expires_in = 30; // The number of days before the password expires.

    public int $min = 6; // The minimum size of the password.

    public bool $mixedCase = false; // If the password requires at least one uppercase and one lowercase letter.

    public bool $letters = false; // If the password requires at least one letter.

    public bool $numbers = false; // If the password requires at least one number.

    public bool $symbols = false; // If the password requires at least one symbol.

    public bool $uncompromised = false; // If the password should not have been compromised in data leaks.

    public int $compromisedThreshold = 0; // The number of times a password can appear in data leaks before being considered compromised.
    
    public ?string $failMessage = null;

    public ?string $failMessage = null;

    private static ?self $instance = null;

    public static function make(): self
    {
        if (! self::$instance) {
            $data = TenantService::getConfig('password');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    public function getPasswordRule(): Password
    {
        $pwd = Password::min($this->min);
        if ($this->mixedCase) {
            $pwd = $pwd->mixedCase();
        }
        if ($this->letters) {
            $pwd = $pwd->letters();
        }
        if ($this->numbers) {
            $pwd = $pwd->numbers();
        }
        if ($this->symbols) {
            $pwd = $pwd->symbols();
        }
        if ($this->uncompromised) {
            $pwd = $pwd->uncompromised($this->compromisedThreshold);
        }
        //$pwd = $pwd->message(__('user::validation'));
        //Cannot access protected property Illuminate\Validation\Rules\Password::$messages
        //$pwd->messages = array_merge($pwd->messages, __('user::validation'));
        //$pwd->fail(__('user::validation'));
        return $pwd;
    }

    public function toArray(): array
    {
        return [
           'otp_expiration_minutes' => $this->otp_expiration_minutes,
           'otp_length' => $this->otp_length,
           'expires_in' => $this->expires_in,
           'min' => $this->min,
           'mixedCase' => $this->mixedCase,
           'letters' => $this->letters,
           'numbers' => $this->numbers,
           'symbols' => $this->symbols,
           'uncompromised' => $this->uncompromised,
           'compromisedThreshold' => $this->compromisedThreshold,
           'failMessage' => $this->failMessage,
        ];
    }

    public function getHelperText(): string
    {
        $msg= 'La password deve essere composta da minimo '.$this->min.' caratteri';
        $msg.=', almeno una lettera maiuscola';
        $msg.=', una minuscola';
        $msg.=', un numero';
        $msg.=' e un carattere speciale.';
        return $msg;
    }
}
