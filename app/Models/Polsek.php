<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Polsek extends Model
{
    protected $fillable = [
        'nama_polsek',
    ];

    public function personnels(): HasMany
    {
        return $this->hasMany(\App\Models\Personnel::class);
    }
}