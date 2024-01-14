<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\RedirectToIndex;
use App\Filament\Traits\PageRecordActions;

class EditQuarter extends EditRecord
{
    use RedirectToIndex, PageRecordActions;

    protected static string $resource = QuarterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
