<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class PengembanganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pengembangan')
                    ->label('Nama Pendidikan')
                    ->required(),

                TextInput::make('kategori')
                    ->label('Kategori')
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan'),
            ]);
    }
}