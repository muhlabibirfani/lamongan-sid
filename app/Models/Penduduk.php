<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['desa_id', 'kartu_keluarga_id', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'status'];
}
