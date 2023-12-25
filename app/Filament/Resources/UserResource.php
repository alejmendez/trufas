<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Filament\Resources\Pages\Page;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'fas-user';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('user.sections.principal'))
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\FileUpload::make('avatar')
                                    ->label(__('user.form.avatar.label'))
                                    ->image()
                                    ->avatar()
                                    ->imageEditor()
                                    ->circleCropper()
                                    // ->directory('avatars')
                                    ->columnSpan(2),
                            ]),
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('dni')
                                    ->label(__('user.form.dni.label'))
                                    ->placeholder(__('user.form.dni.placeholder'))
                                    ->mask('99.999.999-*')
                                    ->regex('/^\d{1,2}\.\d{3}\.\d{3}-[0-9kK]$/')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('dni', Str::upper($state)))
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('name')
                                    ->label(__('user.form.name.label'))
                                    ->placeholder(__('user.form.name.placeholder'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('last_name')
                                    ->label(__('user.form.last_name.label'))
                                    ->placeholder(__('user.form.last_name.placeholder'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->label(__('user.form.email.label'))
                                    ->placeholder(__('user.form.email.placeholder'))
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->label(__('user.form.phone.label'))
                                    ->placeholder(__('user.form.phone.placeholder'))
                                    ->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->required()
                                    ->maxLength(255),
                                // DateTimePicker::make('email_verified_at'),
                            ])
                            ->columns(2),
                    ]),
                    Forms\Components\Section::make(__('user.sections.login'))
                        ->schema([
                            Forms\Components\TextInput::make('email')
                                ->label(__('user.form.email.label'))
                                ->placeholder(__('user.form.email.placeholder'))
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),
                            Forms\Components\TextInput::make('password')
                                ->label(__('user.form.password.label'))
                                ->placeholder(__('user.form.password.placeholder'))
                                ->password()
                                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                ->dehydrated(fn ($state) => filled($state))
                                ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                                ->maxLength(255),
                        ])
                        ->hiddenOn('create'),
                    Forms\Components\Section::make(__('user.sections.roles'))
                        ->schema([
                            Forms\Components\Select::make('roles')
                                ->label(__('user.form.roles.label'))
                                ->placeholder(__('user.form.roles.placeholder'))
                                ->native(false)
                                ->required()
                                ->relationship('roles', 'name'),
                        ])
                        ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__('user.table.full_name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('dni')
                    ->label(__('user.table.dni'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('user.table.phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('user.table.roles'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Administrador' => 'info',
                        'Técnico' => 'success',
                        'Agricultor' => 'gray',
                        'Super Admin' => 'info',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('user.table.email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label(__('user.table.email_verified_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make()->label(''),
                Tables\Actions\EditAction::make()->label('')->color('#6C757D'),
                Tables\Actions\DeleteAction::make()->label('')->color('#6C757D'),
            ])
            ->actionsColumnLabel(__('general.actions.column.label'))
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.administration');
    }

    public static function getNavigationLabel(): string
    {
        return __('user.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('user.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('user.plural_label');
    }
}
