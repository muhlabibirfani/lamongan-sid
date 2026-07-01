<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Surat;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $desaCount = Desa::count();
        $activeDesaCount = Desa::where('status', 'Aktif')->count();
        $suratCount = Surat::count();
        $population = Desa::sum('jumlah_penduduk');

        $districts = Kecamatan::withCount('desa')
            ->withSum('desa', 'jumlah_penduduk')
            ->orderByDesc('desa_count')
            ->take(5)
            ->get()
            ->map(function (Kecamatan $district) {
                return [
                    'name' => $district->nama,
                    'villages' => $district->desa_count,
                    'population' => number_format($district->desa_sum_jumlah_penduduk ?: 0, 0, ',', '.'),
                ];
            })
            ->toArray();

        return view('admin.dashboard', [
            'title' => 'Dashboard admin',
            'cards' => [
                ['label' => 'Total desa', 'value' => (string) $desaCount, 'note' => 'Terkonsolidasi lintas kecamatan'],
                ['label' => 'Total penduduk', 'value' => $this->formatPopulation($population), 'note' => 'Agregat tanpa data pribadi publik'],
                ['label' => 'Surat diproses', 'value' => (string) $suratCount, 'note' => 'Dalam 30 hari terakhir'],
                ['label' => 'Desa aktif', 'value' => (string) $activeDesaCount, 'note' => 'Melakukan pembaruan data'],
            ],
            'districts' => $districts,
        ]);
    }

    private function formatPopulation(int $count): string
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 2, ',', '.') . ' juta';
        }

        return number_format($count, 0, ',', '.');
    }
}
