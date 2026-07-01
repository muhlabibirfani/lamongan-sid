<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DesaController extends Controller
{
    public function index(Request $request): View
    {
        $query = trim($request->string('q')->toString());

        $villages = Desa::with('kecamatan')
            ->when($query !== '', function ($builder) use ($query) {
                $search = "%{$query}%";

                $builder->where('nama', 'like', $search)
                    ->orWhereHas('kecamatan', fn ($query) => $query->where('nama', 'like', $search));
            })
            ->orderBy('nama')
            ->get()
            ->map(function (Desa $desa): array {
                return [
                    'name' => $desa->nama,
                    'district' => $desa->kecamatan->nama ?? '-',
                    'status' => $desa->status,
                    'operator' => $desa->status === 'Aktif' ? 'Sudah ditugaskan' : 'Perlu verifikasi',
                ];
            });

        return view('admin.villages', [
            'title' => 'Data desa',
            'villages' => $villages,
            'query' => $query,
        ]);
    }
}
