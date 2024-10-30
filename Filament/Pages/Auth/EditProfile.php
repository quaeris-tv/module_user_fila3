<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Modules\User\Datas\PasswordData;
use Exception;

class EditProfile extends BaseEditProfile
{
    public static ?string $title = 'Profilo Utente';

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
     *
     * @param Form $form
     * @return Form
     */
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

    /**
     * Recupera il componente per l'inserimento della password con le opzioni di validazione.
     *
     * @return Component
     * @throws Exception
     */
    protected function getPasswordFormComponent(): Component
    {
        $passwordData = PasswordData::make();
        $messages = __('user::validation');

        $field = parent::getPasswordFormComponent();
        if (!method_exists($field, 'validationMessages')) {
            throw new Exception('Metodo validationMessages non esiste');
        }

        return $field
            ->validationMessages($messages)
            ->helperText($passwordData->getHelperText());
    }
}
