<?php

namespace App\Filament\Admin\Resources\Polseks\Pages;

use App\Filament\Admin\Resources\Polseks\PolsekResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ViewPolsek extends ViewRecord
{
    protected static string $resource = PolsekResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_polsek')
                    ->label('Nama Polsek'),
            ]);
    }
}