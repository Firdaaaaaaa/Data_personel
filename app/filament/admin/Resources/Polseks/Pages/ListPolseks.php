<?php

namespace App\Filament\Admin\Resources\Polseks\Pages;

use App\Filament\Admin\Resources\Polseks\PolsekResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPolseks extends ListRecords
{
    protected static string $resource = PolsekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
