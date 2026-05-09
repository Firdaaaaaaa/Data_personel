<?php

namespace App\Filament\Admin\Resources\Jabatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JabatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextEntry::make('nama')
                    ->label('Nama Jabatan')
                    ->columnSpanFull(),

                TextEntry::make('urutan')
                    ->label('Urutan')
                    ->columnSpanFull(),

                TextEntry::make('atasan.nama')
                    ->label('Jabatan Atasan')
                    ->default('Tidak ada')
                    ->columnSpanFull(),
            ]);
    }
}