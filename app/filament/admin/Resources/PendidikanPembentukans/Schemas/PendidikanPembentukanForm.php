<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PendidikanPembentukanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Field 1: Nama Pendidikan
                TextInput::make('nama_pendidikan')
                    ->label('Nama Pendidikan')
                    ->placeholder('Masukkan nama pendidikan (contoh: Diktukba Polri)')
                    ->required(),

                // Field 2: Jenis Diktuk (Pakai Select supaya data rapi)
                Select::make('jenis_diktuk')
                    ->label('Jenis Diktuk')
                    ->options([
                        'Tamtama' => 'Tamtama',
                        'Bintara' => 'Bintara',
                        'Perwira' => 'Perwira',
                    ])
                    ->required(),

                // Field 3: Keterangan (Sesuai mockup untuk detail tambahan)
                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->placeholder('Masukkan detail (contoh: Angkatan 45, Tahun 2024, SPN Lido)')
                    ->rows(3),
            ]);
    }
}