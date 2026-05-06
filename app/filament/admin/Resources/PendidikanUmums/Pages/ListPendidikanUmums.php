<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Pages;

use App\Filament\Admin\Resources\PendidikanUmums\PendidikanUmumResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendidikanUmums extends ListRecords
{
    protected static string $resource = PendidikanUmumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
