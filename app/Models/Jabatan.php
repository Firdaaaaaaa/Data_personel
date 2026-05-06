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

    // relasi ke atasan
    public function parent()
    {
        return $this->belongsTo(Jabatan::class, 'parent_id');
    }

    // relasi ke bawahan (opsional tapi bagus)
    public function children()
    {
        return $this->hasMany(Jabatan::class, 'parent_id');
    }
}