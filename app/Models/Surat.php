<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = ['desa_id', 'nomor', 'jenis', 'pemohon', 'status', 'tanggal_pengajuan'];
}
