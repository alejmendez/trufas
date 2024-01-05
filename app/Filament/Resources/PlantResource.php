<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlantResource\Pages;
use App\Filament\Resources\PlantResource\RelationManagers;
use App\Models\Plant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;

    protected static ?string $navigationIcon = 'fas-tree';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('plant.sections.principal'))
                    ->schema([
                        Forms\Components\Select::make('quarter_id')
                            ->label(__('plant.form.quarter_id.label'))
                            ->relationship('quarter', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label(__('plant.form.name.label'))
                            ->placeholder(__('plant.form.name.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('type')
                            ->label(__('plant.form.type.label'))
                            ->placeholder(__('plant.form.type.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('age')
                            ->label(__('plant.form.age.label'))
                            ->placeholder(__('plant.form.age.placeholder'))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('location')
                            ->label(__('plant.form.location.label'))
                            ->placeholder(__('plant.form.location.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('location_xy')
                            ->label(__('plant.form.location_xy.label'))
                            ->placeholder(__('plant.form.location_xy.placeholder'))
                            ->required(),
                        Forms\Components\DatePicker::make('planned_at')
                            ->label(__('plant.form.planned_at.label'))
                            ->placeholder(__('plant.form.planned_at.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('manager')
                            ->label(__('plant.form.manager.label'))
                            ->placeholder(__('plant.form.manager.placeholder'))
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make(__('plant.sections.documents'))
                    ->schema([
                        Forms\Components\FileUpload::make('photos')
                            ->label(__('plant.form.photos.label'))
                            ->optimize('webp')
                            ->multiple(),
                        Forms\Components\FileUpload::make('documents')
                            ->label(__('plant.form.documents.label'))
                            ->optimize('webp')
                            ->multiple()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('quarter.table.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('quarter.table.type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->label(__('quarter.table.age'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('planned_at')
                    ->label(__('quarter.table.planned_at'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label(__('quarter.table.location'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('quarter.name')
                    ->label(__('quarter.table.quarter_id'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('manager')
                    ->label(__('quarter.table.manager'))
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPlants::route('/'),
            'create' => Pages\CreatePlant::route('/create'),
            'edit' => Pages\EditPlant::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.administration');
    }

    public static function getNavigationLabel(): string
    {
        return __('plant.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('plant.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('plant.plural_label');
    }
}
