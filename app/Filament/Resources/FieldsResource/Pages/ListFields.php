<?php

namespace App\Filament\Resources\FieldsResource\Pages;

use App\Filament\Resources\FieldsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFields extends ListRecords
{
    protected static string $resource = FieldsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
