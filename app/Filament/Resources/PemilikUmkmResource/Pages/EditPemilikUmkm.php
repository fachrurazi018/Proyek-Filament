<?php

namespace App\Filament\Resources\PemilikUmkmResource\Pages;

use App\Filament\Resources\PemilikUmkmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemilikUmkm extends EditRecord
{
    protected static string $resource = PemilikUmkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
