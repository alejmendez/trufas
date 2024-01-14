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
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Grid;

use App\Infolists\Components\ViewImageGalleryEntry;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;

    // protected static ?string $navigationIcon = 'fas-tree';
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
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('type')
                            ->label(__('plant.form.type.label'))
                            ->placeholder(__('plant.form.type.placeholder'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('age')
                            ->label(__('plant.form.age.label'))
                            ->placeholder(__('plant.form.age.placeholder'))
                            ->required()
                            ->maxLength(255)
                            ->numeric(),
                        Forms\Components\TextInput::make('location')
                            ->label(__('plant.form.location.label'))
                            ->placeholder(__('plant.form.location.placeholder'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location_xy')
                            ->label(__('plant.form.location_xy.label'))
                            ->placeholder(__('plant.form.location_xy.placeholder'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('planned_at')
                            ->label(__('plant.form.planned_at.label'))
                            ->placeholder(__('plant.form.planned_at.placeholder'))
                            ->required(),
                        Forms\Components\TextInput::make('manager')
                            ->label(__('plant.form.manager.label'))
                            ->placeholder(__('plant.form.manager.placeholder'))
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Forms\Components\Section::make(__('plant.sections.blueprint'))
                    ->schema([
                        Forms\Components\FileUpload::make('blueprint')
                            //->optimize('webp')
                            ->directory('public/plants')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->label(__('plant.form.blueprint.label')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('plant.table.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('plant.table.type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->label(__('plant.table.age'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('planned_at')
                    ->label(__('plant.table.planned_at'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label(__('plant.table.location'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('plant.name')
                    ->label(__('plant.table.quarter_id'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('manager')
                    ->label(__('plant.table.manager'))
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
                        Tabs\Tab::make(__('plant.tabs.card'))
                            ->schema(static::getTabCard())
                            ->columns(2),
                        Tabs\Tab::make(__('plant.tabs.variables'))
                            ->schema(static::getTabVariables()),
                        Tabs\Tab::make(__('plant.tabs.history'))
                            ->schema(static::getTabHistory()),
                        Tabs\Tab::make(__('plant.tabs.harvest'))
                            ->schema(static::getTabHarvest()),
                        Tabs\Tab::make(__('plant.tabs.statistics'))
                            ->schema(static::getTabStatistics()),
                    ])
            ])
            ->columns(1);
    }

    public static function getTabCard(): array
    {
        return [
            Infolists\Components\TextEntry::make('name')
                ->prefix(__('plant.view.name'))
                ->label(''),
            Grid::make()
                ->schema([
                    ViewImageGalleryEntry::make('documents')
                        ->label(__('plant.view.documents'))
                        ->height('100%')
                        ->width('100%'),
                    Grid::make(1)
                        ->schema([
                            Infolists\Components\TextEntry::make('field.name')
                                ->label(__('plant.view.field_id')),
                            Infolists\Components\TextEntry::make('quarter.name')
                                ->label(__('plant.view.quater_id')),
                            Infolists\Components\TextEntry::make('type')
                                ->label(__('plant.view.type')),
                            Infolists\Components\TextEntry::make('age')
                                ->label(__('plant.view.age')),
                            Infolists\Components\TextEntry::make('planned_at')
                                ->label(__('plant.view.planned_at')),
                            Infolists\Components\TextEntry::make('manager')
                                ->label(__('plant.view.manager')),
                            Infolists\Components\TextEntry::make('location')
                                ->label(__('plant.view.location')),
                        ])
                        ->columnSpan(1),
                ]),
        ];
    }

    public static function getTabVariables(): array
    {
        return [];
    }

    public static function getTabHistory(): array
    {
        return [];
    }

    public static function getTabHarvest(): array
    {
        return [];
    }

    public static function getTabStatistics(): array
    {
        return [];
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
            'view' => Pages\ViewPlant::route('/{record}/view'),
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
