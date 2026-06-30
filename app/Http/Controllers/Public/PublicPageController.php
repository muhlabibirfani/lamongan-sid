<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        return view('public.home', $this->sharedData() + [
            'title' => 'Beranda',
            'breadcrumbs' => [],
        ]);
    }

    public function articles(Request $request): View
    {
        return view('public.articles', $this->sharedData() + [
            'title' => 'Artikel dan pengumuman',
            'breadcrumbs' => [['label' => 'Artikel dan pengumuman']],
        ]);
    }

    public function lapak(): View
    {
        return view('public.lapak', $this->sharedData() + [
            'title' => 'Lapak UMKM',
            'breadcrumbs' => [['label' => 'Lapak UMKM']],
        ]);
    }

    public function map(): View
    {
        return view('public.map', $this->sharedData() + [
            'title' => 'Peta wilayah',
            'breadcrumbs' => [['label' => 'Peta wilayah']],
        ]);
    }

    public function development(): View
    {
        return view('public.development', $this->sharedData() + [
            'title' => 'Pembangunan',
            'breadcrumbs' => [['label' => 'Pembangunan']],
        ]);
    }

    public function statistics(): View
    {
        return view('public.statistics', $this->sharedData() + [
            'title' => 'Statistik',
            'breadcrumbs' => [['label' => 'Statistik']],
        ]);
    }

    public function complaints(): View
    {
        return view('public.complaints', $this->sharedData() + [
            'title' => 'Pengaduan warga',
            'breadcrumbs' => [['label' => 'Pengaduan warga']],
        ]);
    }

    public function services(): View
    {
        return view('public.services', $this->sharedData() + [
            'title' => 'Layanan mandiri warga',
            'breadcrumbs' => [['label' => 'Layanan mandiri warga']],
        ]);
    }

    private function sharedData(): array
    {
        return [
            'districts' => [
                'Babat', 'Bluluk', 'Brondong', 'Deket', 'Glagah', 'Kalitengah',
                'Karangbinangun', 'Karanggeneng', 'Kedungpring', 'Kembangbahu',
                'Lamongan', 'Laren', 'Maduran', 'Mantup', 'Modo', 'Ngimbang',
                'Paciran', 'Pucuk',
            ],
            'mapPoints' => [
                ['name' => 'Babat', 'x' => 19, 'y' => 34, 'villages' => 23, 'population' => '93.420'],
                ['name' => 'Brondong', 'x' => 42, 'y' => 16, 'villages' => 10, 'population' => '76.120'],
                ['name' => 'Paciran', 'x' => 58, 'y' => 18, 'villages' => 17, 'population' => '98.450'],
                ['name' => 'Lamongan', 'x' => 48, 'y' => 54, 'villages' => 20, 'population' => '72.810'],
                ['name' => 'Deket', 'x' => 62, 'y' => 61, 'villages' => 17, 'population' => '49.380'],
                ['name' => 'Kembangbahu', 'x' => 36, 'y' => 70, 'villages' => 18, 'population' => '44.860'],
                ['name' => 'Ngimbang', 'x' => 17, 'y' => 76, 'villages' => 19, 'population' => '46.250'],
                ['name' => 'Karanggeneng', 'x' => 72, 'y' => 42, 'villages' => 18, 'population' => '51.760'],
            ],
            'stats' => [
                ['label' => 'Kecamatan', 'value' => '18'],
                ['label' => 'Desa dan kelurahan', 'value' => '400+'],
                ['label' => 'Penduduk terdata', 'value' => '1,36 juta'],
                ['label' => 'Layanan aktif', 'value' => '24'],
            ],
            'articles' => [
                ['title' => 'Pemutakhiran data sosial desa semester berjalan', 'area' => 'Kabupaten Lamongan', 'date' => '30 Juni 2026', 'excerpt' => 'Pemerintah Kabupaten Lamongan mengoordinasikan pembaruan data sosial untuk memperkuat ketepatan layanan publik.'],
                ['title' => 'Pelayanan administrasi desa berbasis antrean digital', 'area' => 'Kecamatan Babat', 'date' => '27 Juni 2026', 'excerpt' => 'Warga dapat memantau status pengajuan surat melalui kanal layanan mandiri tanpa harus datang berulang kali.'],
                ['title' => 'Publikasi progres pembangunan infrastruktur desa', 'area' => 'Kecamatan Paciran', 'date' => '24 Juni 2026', 'excerpt' => 'Rekapitulasi pekerjaan fisik desa dipublikasikan secara berkala untuk mendukung transparansi anggaran.'],
            ],
            'products' => [
                ['name' => 'Batik Sendangduwur', 'village' => 'Sendangduwur, Paciran', 'price' => 'Rp185.000', 'status' => 'Tersedia'],
                ['name' => 'Keripik ikan laut', 'village' => 'Brondong', 'price' => 'Rp32.000', 'status' => 'Tersedia'],
                ['name' => 'Tenun rumahan', 'village' => 'Parengan, Maduran', 'price' => 'Rp210.000', 'status' => 'Kurasi'],
                ['name' => 'Sambal bandeng', 'village' => 'Deket Kulon', 'price' => 'Rp28.000', 'status' => 'Tersedia'],
            ],
            'projects' => [
                ['name' => 'Peningkatan jalan lingkungan', 'village' => 'Sukorejo', 'budget' => 'Rp420.000.000', 'progress' => 72],
                ['name' => 'Rehabilitasi saluran irigasi', 'village' => 'Karanggeneng', 'budget' => 'Rp315.000.000', 'progress' => 48],
                ['name' => 'Pembangunan posyandu terpadu', 'village' => 'Kembangbahu', 'budget' => 'Rp260.000.000', 'progress' => 86],
            ],
        ];
    }
}
