<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use App\Filament\Traits\RedirectToIndex;
use App\Filament\Traits\PageRecordActions;

class CreateUser extends CreateRecord
{
    use RedirectToIndex, PageRecordActions;

    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Str::random(10);

        return $data;
    }
}
