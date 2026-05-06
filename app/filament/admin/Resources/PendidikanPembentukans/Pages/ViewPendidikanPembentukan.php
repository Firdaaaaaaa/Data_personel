<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans\Pages;

use App\Filament\Admin\Resources\PendidikanPembentukans\PendidikanPembentukanResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ViewPendidikanPembentukan extends ViewRecord
{
    protected static string $resource = PendidikanPembentukanResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_pendidikan')
                    ->label('Nama Pendidikan')
                    ->columnSpanFull(),

                TextEntry::make('jenis_diktuk')
                    ->label('Jenis Diktuk')
                    ->columnSpanFull(),

                TextEntry::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}