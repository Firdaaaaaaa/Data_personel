<?php

namespace App\Filament\Admin\Pages;

use App\Models\Personnel;
use App\Models\Polsek;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class DetailPersonelPolsek extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.admin.pages.detail-personel-polsek';

    public ?Polsek $polsek = null;

    public ?string $filter = null;

    public $personnels = [];

    public function mount(): void
    {
        $id = request()->get('id');

        $this->filter = request()->get('filter');

        $this->polsek = Polsek::findOrFail($id);

        $query = Personnel::query()
            ->where('polsek_id', $id);

        // ================= DIKTUK =================
        if ($this->filter === 'diktuk_sudah') {
            $query->whereNotNull('diktuk_id');
        }

        if ($this->filter === 'diktuk_belum') {
            $query->whereNull('diktuk_id');
        }

        // ================= DIKBANG / DIKJUR =================
        if ($this->filter === 'dikbang_sudah') {
            $query->whereNotNull('dikjur_id');
        }

        if ($this->filter === 'dikbang_belum') {
            $query->whereNull('dikjur_id');
        }

        // ================= DIKUM =================
        if ($this->filter === 'smk') {
            $query->whereHas('dikum', function (Builder $q) {
                $q->whereIn('jenjang_pendidikan', [
                    'SMA',
                    'SMK',
                    'SMA/SMK',
                    'SMA/Sederajat',
                ]);
            });
        }

        if ($this->filter === 'd3') {
            $query->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'D3');
            });
        }

        if ($this->filter === 's1') {
            $query->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'S1');
            });
        }

        if ($this->filter === 's2') {
            $query->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'S2');
            });
        }

        $this->personnels = $query
            ->with([
                'pangkat',
                'jabatan',
                'dikum',
                'diktuk',
                'dikjur',
            ])
            ->get();
    }
}