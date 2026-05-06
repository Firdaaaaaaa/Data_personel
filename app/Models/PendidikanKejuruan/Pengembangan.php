<?php

namespace App\Models\PendidikanKejuruan;

use Illuminate\Database\Eloquent\Model;

class Pengembangan extends Model
{
    protected $table = 'pengembangans'; // opsional, tapi bagus ditulis

    protected $fillable = [
        'nama_pengembangan',
        'kategori',
        'keterangan',
    ];
}