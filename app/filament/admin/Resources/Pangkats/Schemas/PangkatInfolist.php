<?php

namespace App\Filament\Admin\Resources\Pangkats\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PangkatInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID')
                    ->extraAttributes(['class' => 'border-b pb-2']),

                TextEntry::make('nama_pangkat') // sesuaikan kalau nama kolom beda
                    ->label('Nama Pangkat')
                    ->extraAttributes(['class' => 'border-b pb-2 text-lg font-semibold']),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->extraAttributes(['class' => 'border-b pb-2']),

                TextEntry::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime()
                    ->extraAttributes(['class' => 'border-b pb-2']),
            ])
            ->columns(1); // 🔥 full panjang ke bawah
    }
}