<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = ['desa_id', 'nomor_tiket', 'nama_pelapor', 'kontak', 'kategori', 'uraian', 'status'];
}
