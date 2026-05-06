<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans\Pages;

use App\Filament\Admin\Resources\PendidikanPembentukans\PendidikanPembentukanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendidikanPembentukans extends ListRecords
{
    protected static string $resource = PendidikanPembentukanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
