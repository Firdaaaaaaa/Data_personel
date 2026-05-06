<?php

namespace App\Filament\Admin\Resources\Pangkats\Pages;

use App\Filament\Admin\Resources\Pangkats\PangkatResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPangkat extends ViewRecord
{
    protected static string $resource = PangkatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
