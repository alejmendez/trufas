<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuarterResource\Pages;
use App\Filament\Resources\QuarterResource\RelationManagers;
use App\Models\Quarter;
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

class QuarterResource extends Resource
{
    protected static ?string $model = Quarter::class;

    // protected static ?string $navigationIcon = 'fas-tent';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('quarter.sections.principal'))
                    ->schema([
                        Forms\Components\Select::make('field_id')
                            ->label(__('quarter.form.field_id.label'))
                            ->relationship('field', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label(__('quarter.form.name.label'))
                            ->placeholder(__('quarter.form.name.placeholder'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('area')
                            ->label(__('quarter.form.area.label'))
                            ->placeholder(__('quarter.form.area.placeholder'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('count_plants')
                            ->label(__('quarter.form.count_plants.label'))
                            ->hiddenOn('create')
                            ->disabled(),
                        Forms\Components\DatePicker::make('planned_at')
                            ->label(__('quarter.form.planned_at.label'))
                            ->placeholder(__('quarter.form.planned_at.placeholder'))
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make(__('quarter.sections.blueprint'))
                    ->schema([
                        Forms\Components\FileUpload::make('blueprint')
                            //->optimize('webp')
                            ->directory('public/quarters')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->label(__('quarter.form.blueprint.label')),
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
                Tables\Columns\TextColumn::make('field.name')
                    ->label(__('quarter.table.field_id'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->label(__('quarter.table.area'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('count_plants')
                    ->label(__('quarter.table.count_plants'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('planned_at')
                    ->label(__('quarter.table.planned_at'))
                    ->date()
                    ->sortable(),
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
                        Tabs\Tab::make(__('quarter.tabs.card'))
                            ->schema(static::getTabCard())
                            ->columns(2),
                        Tabs\Tab::make(__('quarter.tabs.documentation'))
                            ->schema(static::getTabDocumentation()),
                        Tabs\Tab::make(__('quarter.tabs.activity'))
                            ->schema(static::getTabHarvest()),
                        Tabs\Tab::make(__('quarter.tabs.statistics'))
                            ->schema(static::getTabStatistics()),
                    ])
            ])
            ->columns(1);
    }

    public static function getTabCard(): array
    {
        return [
            Infolists\Components\TextEntry::make('name')
                ->prefix(__('quarter.view.name'))
                ->label(''),
            Grid::make()
                ->schema([
                    ViewImageGalleryEntry::make('blueprint')
                        ->label(__('quarter.view.blueprint'))
                        ->height('100%')
                        ->width('100%'),
                    Grid::make(1)
                        ->schema([
                            Infolists\Components\TextEntry::make('field.name')
                                ->label(__('quarter.view.field_id')),
                            Infolists\Components\TextEntry::make('area')
                                ->label(__('quarter.view.area')),
                            Infolists\Components\TextEntry::make('count_plants')
                                ->label(__('quarter.view.count_plants')),
                            Infolists\Components\TextEntry::make('planned_at')
                                ->label(__('quarter.view.planned_at'))
                                ->dateTime(),
                        ])
                        ->columnSpan(1),
                ]),
        ];;
    }

    public static function getTabDocumentation(): array
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
            'index' => Pages\ListQuarters::route('/'),
            'view' => Pages\ViewQuarter::route('/{record}/view'),
            'create' => Pages\CreateQuarter::route('/create'),
            'edit' => Pages\EditQuarter::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.administration');
    }

    public static function getNavigationLabel(): string
    {
        return __('quarter.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('quarter.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('quarter.plural_label');
    }
}
