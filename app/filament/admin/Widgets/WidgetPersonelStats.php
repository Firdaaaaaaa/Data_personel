<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Personnel;

class WidgetPersonelStats extends BaseWidget
{
    // ✅ BIAR FULL KE ATAS
    protected int | string | array $columnSpan = 'full';

    // (opsional, biar urutan paling atas)
    protected static ?int $sort = 1;

    protected static ?int $grid = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Anggota', Personnel::count())
                ->description('Total keseluruhan anggota')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
        ];
    }
}