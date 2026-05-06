<?php

namespace App\Filament\Admin\Resources\Pangkats\Pages;

use App\Filament\Admin\Resources\Pangkats\PangkatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPangkats extends ListRecords
{
    protected static string $resource = PangkatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
