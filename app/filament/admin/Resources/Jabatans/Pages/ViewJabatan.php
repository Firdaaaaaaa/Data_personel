<?php

namespace App\Filament\Admin\Resources\Jabatans\Pages;

use App\Filament\Admin\Resources\Jabatans\JabatanResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ViewJabatan extends ViewRecord
{
    protected static string $resource = JabatanResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->record($this->record->load('atasan'))
            ->columns(1)
            ->components([
                TextEntry::make('nama')
                    ->label('Nama Jabatan')
                    ->default('-')
                    ->columnSpanFull(),

                TextEntry::make('urutan')
                    ->label('Urutan')
                    ->default('-')
                    ->columnSpanFull(),

                TextEntry::make('atasan.nama')
                    ->label('Jabatan Atasan')
                    ->default('Tidak ada')
                    ->columnSpanFull(),
            ]);
    }
}