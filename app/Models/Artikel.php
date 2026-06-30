<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['desa_id', 'judul', 'slug', 'ringkasan', 'konten', 'kategori', 'status', 'published_at'];
}
