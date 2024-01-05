<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('avatar')
                            ->label(__('user.form.avatar.label'))
                            ->image()
                            ->avatar()
                            ->optimize('webp')
                            ->imageEditor()
                            ->circleCropper()
                    ]),
                TextInput::make('name')
                    ->label(__('user.form.name.label'))
                    ->placeholder(__('user.form.name.placeholder'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->label(__('user.form.last_name.label'))
                    ->placeholder(__('user.form.last_name.placeholder'))
                    ->required()
                    ->maxLength(255),
                $this->getEmailFormComponent(),
                TextInput::make('phone')
                    ->label(__('user.form.phone.label'))
                    ->placeholder(__('user.form.phone.placeholder'))
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required()
                    ->maxLength(255),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
