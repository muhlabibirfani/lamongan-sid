<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggaranDesa extends Model
{
    protected $table = 'anggaran_desa';

    protected $fillable = ['desa_id', 'tahun', 'kategori', 'uraian', 'nilai', 'realisasi', 'status'];
}
