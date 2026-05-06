<?php

namespace App\Filament\Admin\Resources\Jabatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JabatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1) // full ke bawah
            ->components([

                TextEntry::make('nama')
                    ->label('Nama Jabatan')
                    ->extraAttributes([
                        'class' => 'border-b pb-3 text-xl font-bold'
                    ]),

                TextEntry::make('urutan')
                    ->label('Urutan')
                    ->extraAttributes([
                        'class' => 'border-b pb-2'
                    ]),

                TextEntry::make('atasan.nama')
                    ->label('Jabatan Atasan')
                    ->state(fn ($record) => $record->atasan?->nama ?? 'Tidak ada')
                    ->extraAttributes([
                        'class' => 'border-b pb-2'
                    ]),
            ]);
    }
}