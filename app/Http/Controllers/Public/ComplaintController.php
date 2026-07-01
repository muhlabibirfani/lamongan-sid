<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengaduanRequest;
use App\Models\Desa;
use App\Models\Pengaduan;
use Illuminate\Http\RedirectResponse;

class ComplaintController extends Controller
{
    public function store(StorePengaduanRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $desa = Desa::where('nama', $validated['desa'])
            ->orWhere('nama', 'like', '%' . $validated['desa'] . '%')
            ->first();

        Pengaduan::create([
            'desa_id' => $desa->id ?? null,
            'nomor_tiket' => 'TK' . time() . rand(100, 999),
            'nama_pelapor' => $validated['nama'],
            'kontak' => $validated['kontak'],
            'kategori' => $validated['kategori'],
            'uraian' => $validated['uraian'],
            'status' => 'Pending',
        ]);

        return redirect()->route('complaints')
            ->with('status', 'Pengaduan Anda telah diterima. Nomor tiket akan dikirimkan melalui kontak yang terdaftar.');
    }
}
