<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FieldResource\Pages;
use App\Filament\Resources\FieldResource\RelationManagers;
use App\Models\Field;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Grid;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static ?string $navigationIcon = 'fas-house';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('field.sections.principal'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('field.form.name.label'))
                            ->placeholder(__('field.form.name.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('location')
                            ->label(__('field.form.location.label'))
                            ->placeholder(__('field.form.location.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('size')
                            ->label(__('field.form.size.label'))
                            ->placeholder(__('field.form.size.placeholder'))
                            ->required(),
                        Forms\Components\Placeholder::make('count_plants')
                            ->label(__('field.form.count_plants.label'))
                            ->hiddenOn('create')
                            ->content(fn (Field $record): string => $record->count_plants),
                    ])
                    ->columns(2),
                Forms\Components\Section::make(__('field.sections.blueprint'))
                    ->schema([
                        Forms\Components\FileUpload::make('blueprint')
                            ->label(__('field.form.blueprint.label'))
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('field.table.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label(__('field.table.location'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('size')
                    ->label(__('field.table.size'))
                    ->searchable(),
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
                Tables\Actions\ViewAction::make()->label('')->color('#6C757D'),
                Tables\Actions\EditAction::make()->label('')->color('#6C757D'),
                Tables\Actions\DeleteAction::make()->label('')->color('#6C757D'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make(__('field.tabs.card'))
                            ->schema(static::getTabCard())
                            ->columns(2),
                        Tabs\Tab::make(__('field.tabs.activity'))
                            ->schema([
                                // ...
                            ]),
                        Tabs\Tab::make(__('field.tabs.statistics'))
                            ->schema([
                                // ...
                            ]),
                    ])
            ])
            ->columns(1);
    }

    public static function getTabCard(): array
    {
        return [
            Infolists\Components\TextEntry::make('name')
                ->prefix(__('field.view.name'))
                ->label(''),
            Grid::make()
                ->schema([
                    Infolists\Components\ImageEntry::make('blueprint')
                        ->label(__('field.view.blueprint'))
                        ->height('100%')
                        ->width('100%'),
                    Grid::make(1)
                        ->schema([
                            Infolists\Components\TextEntry::make('location')
                                ->label(__('field.view.location')),
                            Infolists\Components\TextEntry::make('size')
                                ->label(__('field.view.size')),
                            Infolists\Components\TextEntry::make('count_plants')
                                ->label(__('field.view.count_plants')),
                            Infolists\Components\TextEntry::make('count_quarters')
                                ->label(__('field.view.count_quarters')),
                        ])
                        ->columnSpan(1),
                ]),
        ];
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
            'index' => Pages\ListFields::route('/'),
            'view' => Pages\ViewField::route('/{record}/view'),
            'create' => Pages\CreateField::route('/create'),
            'edit' => Pages\EditField::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.administration');
    }

    public static function getNavigationLabel(): string
    {
        return __('field.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('field.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('field.plural_label');
    }
}
