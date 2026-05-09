<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PendidikanUmumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('jenjang_pendidikan')
                    ->label('Jenjang Pendidikan')
                    ->required(),

                TextInput::make('jurusan')
                    ->label('Nama Pendidikan')
                    ->required(),

                TextInput::make('keterangan')
                    ->label('Keterangan')
                    ->placeholder('Contoh: Tahun 2020')
                    ->required(),

            ]);
    }
}
