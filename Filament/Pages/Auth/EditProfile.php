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
use Modules\User\Datas\PasswordData;
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
        $pwd = PasswordData::make();
        $messages = __('user::validation');
       
        $field=parent::getPasswordFormComponent();
        if(!method_exists($field,'validationMessages')){
            throw new \Exception('method validationMessages not exists');
        }
        return  $field
            ->validationMessages($messages)
            ->helperText($pwd->getHelperText())
            //->live()
            ;
        
    }
}
