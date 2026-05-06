<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    // nama tabel (opsional tapi bagus ditulis)
    protected $table = 'pangkats';

    // field yang boleh diisi
    protected $fillable = [

        'nama_pangkat',
        'golongan',
        'urutan_pangkat',

    ];

}
