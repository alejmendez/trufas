<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\RedirectToIndex;

class EditQuarter extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = QuarterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
