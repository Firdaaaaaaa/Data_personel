<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Admin\Widgets\WidgetPersonelStats::class, // atas
            \App\Filament\Admin\Widgets\PersonelPerPolsekChart::class, // bawah
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }
}