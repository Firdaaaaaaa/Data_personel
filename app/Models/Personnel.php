<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pangkat;
use App\Models\Jabatan;
use App\Models\PendidikanUmum;
use App\Models\PendidikanPembentukan;
use App\Models\PendidikanKejuruan\Pengembangan;
use App\Models\Polsek;

class Personnel extends Model
{
    protected $fillable = [
        'nama',
        'nrp',
        'pangkat_id',
        'jabatan_id',
        'dikum_id',
        'diktuk_id',
        'dikjur_id',
        'polsek_id',
        'foto', // 🔥 FIX WAJIB
    ];

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function dikum()
    {
        return $this->belongsTo(PendidikanUmum::class, 'dikum_id');
    }

    public function diktuk()
    {
        return $this->belongsTo(PendidikanPembentukan::class, 'diktuk_id');
    }

    public function dikjur()
    {
        return $this->belongsTo(Pengembangan::class, 'dikjur_id');
    }

    public function polsek()
    {
        return $this->belongsTo(Polsek::class);
    }
}