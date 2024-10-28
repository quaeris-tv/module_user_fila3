<?php

namespace Modules\User\Filament\Pages\Auth;


use Closure;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Storage;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{

    static ?string $title = 'aaaa';
    

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            //->revealable(false)
            ->live()
            /*
            ->afterStateUpdated(function (Set $set, $state) {
                $validator = Validator::make(['new_password' => $state], [
                    'new_password' => Password::default(),
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors()->get('new_password');
                    $set('password_errors', $errors); // Set the errors to a variable
                } else {
                    $set('password_errors', []);
                }
                
            })->helperText(fn (Get $get): ?string => implode(', ',Arr::wrap($get('password_errors')) ))
            ;
            */
            /*
            ->rule(function ($attribute, $value, $fail) {
                if (!Password::default()->passes($attribute, $value)) {
                    $fail(__('La password deve essere composta da minimo 12 caratteri e almeno una lettera maiuscola, una minuscola, un numero e un carattere speciale.'));
                }
            });
            */
            /*
            ->rules([
                fn(): Closure => function (string $attribute, $value, Closure $fail) {
                    
                    $fail('zibibbo');
                },
            ]);
            */
            ->validationMessages([
                '*' => 'La password deve essere composta da minimo 12 caratteri e almeno una lettera maiuscola, una minuscola, un numero e un carattere speciale.'
            ]);
    }
}
