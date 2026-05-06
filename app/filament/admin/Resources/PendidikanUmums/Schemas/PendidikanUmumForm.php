<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

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
            ]);
    }
}