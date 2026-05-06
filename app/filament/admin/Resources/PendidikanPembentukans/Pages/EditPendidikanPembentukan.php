<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans\Pages;

use App\Filament\Admin\Resources\PendidikanPembentukans\PendidikanPembentukanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPendidikanPembentukan extends EditRecord
{
    protected static string $resource = PendidikanPembentukanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
