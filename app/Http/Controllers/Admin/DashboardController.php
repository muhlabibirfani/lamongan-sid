<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard admin',
            'cards' => [
                ['label' => 'Total desa', 'value' => '400+', 'note' => 'Terkonsolidasi lintas kecamatan'],
                ['label' => 'Total penduduk', 'value' => '1,36 juta', 'note' => 'Agregat tanpa data pribadi publik'],
                ['label' => 'Surat diproses', 'value' => '1.284', 'note' => 'Dalam 30 hari terakhir'],
                ['label' => 'Desa aktif', 'value' => '386', 'note' => 'Melakukan pembaruan data'],
            ],
            'districts' => [
                ['name' => 'Babat', 'villages' => 23, 'population' => '93.420'],
                ['name' => 'Lamongan', 'villages' => 20, 'population' => '72.810'],
                ['name' => 'Paciran', 'villages' => 17, 'population' => '98.450'],
                ['name' => 'Brondong', 'villages' => 10, 'population' => '76.120'],
                ['name' => 'Deket', 'villages' => 17, 'population' => '49.380'],
            ],
        ]);
    }
}
