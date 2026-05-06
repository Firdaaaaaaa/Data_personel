<?php

namespace App\Filament\Admin\Resources\Polseks;

use App\Filament\Admin\Resources\Polseks\Pages\CreatePolsek;
use App\Filament\Admin\Resources\Polseks\Pages\EditPolsek;
use App\Filament\Admin\Resources\Polseks\Pages\ListPolseks;
use App\Filament\Admin\Resources\Polseks\Pages\ViewPolsek; // ✅ AKTIF
use App\Filament\Admin\Resources\Polseks\Schemas\PolsekForm;
use App\Filament\Admin\Resources\Polseks\Tables\PolseksTable;
use App\Models\Polsek;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PolsekResource extends Resource
{
    protected static ?string $model = Polsek::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 7;

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
            'view' => ViewPolsek::route('/{record}'), // ✅ WAJIB
            'edit' => EditPolsek::route('/{record}/edit'),
        ];
    }
}