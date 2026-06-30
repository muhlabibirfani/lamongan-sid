<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desa extends Model
{
    protected $fillable = ['kecamatan_id', 'nama', 'kode', 'jenis', 'status', 'jumlah_penduduk', 'jumlah_kk'];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
