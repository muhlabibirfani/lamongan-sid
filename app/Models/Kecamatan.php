<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    protected $fillable = ['nama', 'kode', 'status'];

    public function desa(): HasMany
    {
        return $this->hasMany(Desa::class);
    }
}
