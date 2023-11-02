<?php

namespace App\Filament\Resources\PemilikUmkmResource\Pages;

use App\Filament\Resources\PemilikUmkmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemilikUmkms extends ListRecords
{
    protected static string $resource = PemilikUmkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
