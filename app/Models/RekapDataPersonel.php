<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapDataPersonel extends Model
{
    protected $table = 'rekap_data_personels';

    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}