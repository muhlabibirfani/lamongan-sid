<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DesaController extends Controller
{
    public function index(Request $request): View
    {
        $villages = collect([
            ['name' => 'Babat', 'district' => 'Babat', 'status' => 'Aktif', 'operator' => 'Sudah ditugaskan'],
            ['name' => 'Sendangduwur', 'district' => 'Paciran', 'status' => 'Aktif', 'operator' => 'Sudah ditugaskan'],
            ['name' => 'Deket Kulon', 'district' => 'Deket', 'status' => 'Aktif', 'operator' => 'Sudah ditugaskan'],
            ['name' => 'Karanggeneng', 'district' => 'Karanggeneng', 'status' => 'Pending', 'operator' => 'Perlu verifikasi'],
            ['name' => 'Kembangbahu', 'district' => 'Kembangbahu', 'status' => 'Aktif', 'operator' => 'Sudah ditugaskan'],
        ]);

        return view('admin.villages', [
            'title' => 'Data desa',
            'villages' => $villages,
            'query' => $request->string('q')->toString(),
        ]);
    }
}
