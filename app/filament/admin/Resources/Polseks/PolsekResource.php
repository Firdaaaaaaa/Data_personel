<?php

namespace App\Filament\Admin\Resources\Polseks;

use App\Filament\Admin\Resources\Polseks\Pages\CreatePolsek;
use App\Filament\Admin\Resources\Polseks\Pages\EditPolsek;
use App\Filament\Admin\Resources\Polseks\Pages\ListPolseks;
use App\Filament\Admin\Resources\Polseks\Pages\ViewPolsek;
use App\Filament\Admin\Resources\Polseks\Schemas\PolsekForm;
use App\Filament\Admin\Resources\Polseks\Tables\PolseksTable;
use App\Models\Polsek;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PolsekResource extends Resource
{
    protected static ?string $model = Polsek::class;

    // Ikon
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    // Label menu
    protected static ?string $navigationLabel = 'Daftar Polsek';

    // Label plural
    protected static ?string $pluralLabel = 'Daftar Polsek';

    // Label singular
    protected static ?string $modelLabel = 'Polsek';

    // Urutan menu
    protected static ?int $navigationSort = 7;

    // HAPUS ATAU COMMENT BARIS INI DULU
    // protected static ?string $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return PolsekForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PolseksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPolseks::route('/'),
            'create' => CreatePolsek::route('/create'),
            'view' => ViewPolsek::route('/{record}'),
            'edit' => EditPolsek::route('/{record}/edit'),
        ];
    }
}