<?php

namespace App\Filament\Admin\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Personnel;
use Filament\Tables\Columns\TextColumn;

class WidgetPersonel extends TableWidget
{
    protected static ?string $heading = 'Data Personel';

    protected int | string | array $columnSpan = 'full';

    // TAMBAHKAN KODE INI DI SINI
    public static function canView(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Personnel::query()->latest()->limit(5)) 

            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('nrp')
                    ->label('NRP'),

                TextColumn::make('jabatan.nama')
                    ->label('Jabatan')
                    ->limit(15), 

                TextColumn::make('polsek.nama_polsek')
                    ->label('Polsek')
                    ->badge(), 
            ])

            ->striped() 
            ->paginated(false); 
    }
}