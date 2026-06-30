<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUmkm extends Model
{
    protected $table = 'produk_umkm';

    protected $fillable = ['desa_id', 'nama', 'pelaku_usaha', 'harga', 'status', 'deskripsi'];
}
