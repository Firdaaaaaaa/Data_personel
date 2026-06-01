<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages;

use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\PengembanganResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ViewPengembangan extends ViewRecord
{
    protected static string $resource = PengembanganResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_pengembangan')
                    ->label('Nama Pendidikan')
                    ->columnSpanFull(),

                TextEntry::make('kategori')
                    ->label('Kategori')
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
