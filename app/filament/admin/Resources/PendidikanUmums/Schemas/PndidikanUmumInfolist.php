<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendidikanUmumInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([

                TextEntry::make('jenjang_pendidikan')
                    ->label('Jenjang Pendidikan')
                    ->extraAttributes([
                        'class' => 'border-b pb-3 text-lg font-bold'
                    ]),

                TextEntry::make('jurusan')
                    ->label('Nama Pendidikan')
                    ->extraAttributes([
                        'class' => 'border-b pb-2'
                    ]),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->extraAttributes([
                        'class' => 'border-b pb-2'
                    ]),
            ]);
    }
}