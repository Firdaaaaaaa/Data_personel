<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Personnel;
use Filament\Widgets\ChartWidget;

class PersonelPerPolsekChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Personel Berdasarkan Polsek';

    // ✅ FIX: tidak terlalu lebar
    protected int | string | array $columnSpan = '1/2';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Personnel::selectRaw('polsek_id, count(*) as total')
            ->groupBy('polsek_id')
            ->with('polsek')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Personel',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(245, 158, 11, 0.8)',
                    'borderColor' => '#D97706',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $data->pluck('polsek.nama_polsek')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): ?array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}