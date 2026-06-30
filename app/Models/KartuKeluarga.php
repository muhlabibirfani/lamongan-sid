<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';

    protected $fillable = ['desa_id', 'nomor_kk_hash', 'kepala_keluarga', 'alamat', 'status'];
}
