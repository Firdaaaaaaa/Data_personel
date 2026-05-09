<?php

namespace App\Filament\Admin\Resources\Pangkats\Pages;

use App\Filament\Admin\Resources\Pangkats\PangkatResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ViewPangkat extends ViewRecord
{
    protected static string $resource = PangkatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1) // 🔥 lurus ke bawah
            ->components([
                TextEntry::make('id')
                    ->label('No'),

                TextEntry::make('nama_pangkat')
                    ->label('Nama Pangkat'),

                TextEntry::make('golongan')
                    ->label('Golongan'),
            ]);
    }
}