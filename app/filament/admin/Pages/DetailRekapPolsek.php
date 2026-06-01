<?php

namespace App\Filament\Admin\Pages;

use App\Models\Personnel;
use App\Models\Polsek;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class DetailRekapPolsek extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-chart-bar';

    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.admin.pages.detail-rekap-polsek';

    public ?Polsek $polsek = null;

    public array $rekap = [];

    public ?string $filter = null;

    public $detailPersonels = [];

    public function mount(): void
    {
        $id = request()->get('id');

        $this->polsek = Polsek::findOrFail($id);

        // ================= TOTAL PERSONEL =================
        $totalPersonel = Personnel::query()
            ->where('polsek_id', $id)
            ->count();

        // ================= DIKTUK =================
        $diktukSudah = Personnel::query()
            ->where('polsek_id', $id)
            ->whereNotNull('diktuk_id')
            ->count();

        $diktukBelum = $totalPersonel - $diktukSudah;

        // ================= DIKBANG / DIKJUR =================
        $dikbangSudah = Personnel::query()
            ->where('polsek_id', $id)
            ->whereNotNull('dikjur_id')
            ->count();

        $dikbangBelum = $totalPersonel - $dikbangSudah;

        // ================= DIKUM TERAKHIR =================
        $smk = Personnel::query()
            ->where('polsek_id', $id)
            ->whereHas('dikum', function (Builder $q) {
                $q->whereIn('jenjang_pendidikan', [
                    'SMA',
                    'SMK',
                    'SMA/SMK',
                    'SMA/Sederajat',
                ]);
            })
            ->count();

        $d3 = Personnel::query()
            ->where('polsek_id', $id)
            ->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'D3');
            })
            ->count();

        $s1 = Personnel::query()
            ->where('polsek_id', $id)
            ->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'S1');
            })
            ->count();

        $s2 = Personnel::query()
            ->where('polsek_id', $id)
            ->whereHas('dikum', function (Builder $q) {
                $q->where('jenjang_pendidikan', 'S2');
            })
            ->count();

        $this->rekap = [
            'jumlah_personel' => $totalPersonel,

            'diktuk_sudah' => $diktukSudah,
            'diktuk_belum' => $diktukBelum,

            'dikbang_sudah' => $dikbangSudah,
            'dikbang_belum' => $dikbangBelum,

            'smk' => $smk,
            'd3' => $d3,
            's1' => $s1,
            's2' => $s2,
        ];

        $this->detailPersonels = collect();
    }

    public function filterData($filter): void
    {
        $this->filter = $filter;

        $query = Personnel::query()
            ->where('polsek_id', $this->polsek->id);

        switch ($filter) {

            // ================= SEMUA =================
            case 'semua':
                break;

            // ================= DIKTUK =================
            case 'diktuk_sudah':
                $query->whereNotNull('diktuk_id');
                break;

            case 'diktuk_belum':
                $query->whereNull('diktuk_id');
                break;

            // ================= DIKBANG / DIKJUR =================
            case 'dikbang_sudah':
                $query->whereNotNull('dikjur_id');
                break;

            case 'dikbang_belum':
                $query->whereNull('dikjur_id');
                break;

            // ================= DIKUM =================
            case 'smk':
                $query->whereHas('dikum', function (Builder $q) {
                    $q->whereIn('jenjang_pendidikan', [
                        'SMA',
                        'SMK',
                        'SMA/SMK',
                        'SMA/Sederajat',
                    ]);
                });
                break;

            case 'd3':
                $query->whereHas('dikum', function (Builder $q) {
                    $q->where('jenjang_pendidikan', 'D3');
                });
                break;

            case 's1':
                $query->whereHas('dikum', function (Builder $q) {
                    $q->where('jenjang_pendidikan', 'S1');
                });
                break;

            case 's2':
                $query->whereHas('dikum', function (Builder $q) {
                    $q->where('jenjang_pendidikan', 'S2');
                });
                break;
        }

        $this->detailPersonels = $query
            ->with([
                'pangkat',
                'jabatan',
                'dikum',
                'diktuk',
                'dikjur',
            ])
            ->get();
    }

    public function closeModal(): void
    {
        $this->filter = null;
        $this->detailPersonels = collect();
    }
}