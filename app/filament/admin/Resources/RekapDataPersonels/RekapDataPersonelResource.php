<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels;

use App\Filament\Admin\Resources\RekapDataPersonels\Pages;
use App\Filament\Admin\Resources\RekapDataPersonels\Pages\ListRekapDataPersonels;
use App\Filament\Admin\Resources\RekapDataPersonels\Tables\RekapDataPersonelsTable;
use App\Models\Personnel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RekapDataPersonelResource extends Resource
{
    protected static ?string $model = Personnel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Rekap Data Personel';
    protected static ?string $modelLabel = 'Rekap Data Personel';
    protected static ?string $pluralModelLabel = 'Rekap Data Personel';
    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return RekapDataPersonelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    // 🔥 FIX FINAL
    public static function getPages(): array
    {
        return [
            'index' => ListRekapDataPersonels::route('/'),

            // ✅ AMAN (tidak error lagi)
            'view' => Pages\ViewRekapDataPersonel::route('/view/{polsek_id?}'),
        ];
    }
}