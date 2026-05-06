<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels\Pages;

use Filament\Resources\Pages\Page;
use App\Models\Personnel;
use App\Filament\Admin\Resources\RekapDataPersonels\RekapDataPersonelResource;

class ViewRekapDataPersonel extends Page
{
    protected static string $resource = RekapDataPersonelResource::class;

    protected string $view = 'filament.admin.pages.view-personnel-by-polsek';

    public $polsek_id;
    public $personnels; // 🔥 UBAH INI

    public function mount($polsek_id)
    {
        $this->polsek_id = $polsek_id;

        $this->personnels = Personnel::with([
            'pangkat',
            'jabatan',
            'dikum',
            'diktuk',
            'dikjur',
            'polsek'
        ])
        ->where('polsek_id', $polsek_id)
        ->get();
    }
}