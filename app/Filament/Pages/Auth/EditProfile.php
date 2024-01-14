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
                            //->optimize('webp')
                            ->directory('public/avatars')
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
                TextInput::make('email')
                    ->label(__('user.form.email.label'))
                    ->placeholder(__('user.form.email.placeholder'))
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label(__('user.form.phone.label'))
                    ->placeholder(__('user.form.phone.placeholder'))
                    ->tel()
                    ->extraInputAttributes(['data-type' => 'tel'])
                    ->maxLength(18),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
