<?php

namespace App\Filament\Resources\QuartersResource\Pages;

use App\Filament\Resources\QuartersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuarters extends EditRecord
{
    protected static string $resource = QuartersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
