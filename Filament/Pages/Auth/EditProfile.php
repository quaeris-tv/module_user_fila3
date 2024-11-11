<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Modules\User\Datas\PasswordData;

class EditProfile extends BaseEditProfile
{
    public static ?string $title = 'Profilo Utente';

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                // $this->getPasswordFormComponent(),
                // $this->getPasswordConfirmationFormComponent(),
                /*
                PasswordData::make()->getPasswordFormComponent('new_password'),
                PasswordData::make()->getPasswordConfirmationFormComponent(),
                */
                ...PasswordData::make()->getPasswordFormComponents('new_password'),
            ]);
    }
    /*
    protected function getPasswordFormComponent(): Component
    {
        $passwordData = PasswordData::make();
        $messages = __('user::validation');

        $field = parent::getPasswordFormComponent();
        if (! method_exists($field, 'validationMessages')) {
            throw new \Exception('method validationMessages not exists');
        }

        return $field
            ->validationMessages($messages)
            ->helperText($pwd->getHelperText())
            // ->live()
        ;
    }
    */
}
