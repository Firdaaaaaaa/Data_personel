<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanPembentukan extends Model
{
    // Ini kuncinya supaya tidak error MassAssignmentException lagi
    protected $fillable = [
        'nama_pendidikan',
        'jenis_diktuk',
        'keterangan',
    ];
}