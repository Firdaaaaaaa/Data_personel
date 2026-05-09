<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanUmum extends Model
{
    protected $fillable = [
        'jenjang_pendidikan',
        'jurusan',
        'keterangan',
    ];
}
