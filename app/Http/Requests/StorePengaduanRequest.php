<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengaduanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:120'],
            'kontak' => ['required', 'string', 'max:80'],
            'kecamatan' => ['required', 'string', 'max:80'],
            'desa' => ['required', 'string', 'max:120'],
            'kategori' => ['required', 'string', 'max:80'],
            'uraian' => ['required', 'string', 'min:20', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama pelapor wajib diisi agar petugas dapat melakukan verifikasi.',
            'kontak.required' => 'Kontak aktif wajib diisi untuk pengiriman nomor tiket.',
            'uraian.min' => 'Uraian pengaduan minimal 20 karakter agar petugas memahami konteks laporan.',
        ];
    }
}
