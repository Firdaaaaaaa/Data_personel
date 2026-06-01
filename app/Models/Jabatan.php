<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'nama',
        'urutan',
        'parent_id',
    ];

    public function atasan()
    {
        return $this->belongsTo(Jabatan::class, 'parent_id');
    }

    public function bawahan()
    {
        return $this->hasMany(Jabatan::class, 'parent_id');
    }

    public function personnels()
    {
        return $this->hasMany(Personnel::class);
    }
}
