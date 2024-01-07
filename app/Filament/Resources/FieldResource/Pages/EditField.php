<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\RedirectToIndex;

class EditField extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = FieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
