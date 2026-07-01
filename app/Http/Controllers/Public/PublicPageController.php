<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\ProdukUmkm;
use App\Models\Penduduk;
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
        $searchQuery = $request->string('q')->toString();
        $selectedKecamatan = $request->string('kecamatan')->toString();

        return view('public.articles', $this->sharedData() + [
            'title' => 'Artikel dan pengumuman',
            'breadcrumbs' => [['label' => 'Artikel dan pengumuman']],
            'articles' => $this->getArticles($searchQuery, $selectedKecamatan),
            'searchQuery' => $searchQuery,
            'selectedKecamatan' => $selectedKecamatan,
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
        $districtNames = $this->getDistrictNames();
        $topKecamatan = Kecamatan::withCount('desa')
            ->withSum('desa', 'jumlah_penduduk')
            ->orderByDesc('desa_count')
            ->take(8)
            ->get();

        return [
            'districts' => $districtNames,
            'totalDistricts' => count($districtNames),
            'totalDesa' => Desa::count(),
            'mapPoints' => $this->getMapPoints($topKecamatan),
            'stats' => $this->getStats(),
            'articles' => $this->getArticles(),
            'products' => $this->getProducts(),
            'projects' => $this->getProjects(),
        ];
    }

    private function getDistrictNames(): array
    {
        $districts = Kecamatan::orderBy('nama')->pluck('nama')->toArray();

        return $districts ?: [
            'Babat', 'Bluluk', 'Brondong', 'Deket', 'Glagah', 'Kalitengah',
            'Karangbinangun', 'Karanggeneng', 'Kedungpring', 'Kembangbahu',
            'Lamongan', 'Laren', 'Maduran', 'Mantup', 'Modo', 'Ngimbang',
            'Paciran', 'Pucuk',
        ];
    }

    private function getStats(): array
    {
        $desaCount = Desa::count();
        $pendudukCount = Penduduk::count() ?: Desa::sum('jumlah_penduduk');

        return [
            ['label' => 'Kecamatan', 'value' => (string) Kecamatan::count()],
            ['label' => 'Desa dan kelurahan', 'value' => (string) $desaCount],
            ['label' => 'Penduduk terdata', 'value' => $this->formatPopulation($pendudukCount)],
            ['label' => 'Layanan aktif', 'value' => '24'],
        ];
    }

    private function getMapPoints($kecamatans): array
    {
        if ($kecamatans->isEmpty()) {
            return [
                ['name' => 'Babat', 'x' => 19, 'y' => 34, 'villages' => 23, 'population' => '93.420'],
                ['name' => 'Brondong', 'x' => 42, 'y' => 16, 'villages' => 10, 'population' => '76.120'],
                ['name' => 'Paciran', 'x' => 58, 'y' => 18, 'villages' => 17, 'population' => '98.450'],
                ['name' => 'Lamongan', 'x' => 48, 'y' => 54, 'villages' => 20, 'population' => '72.810'],
            ];
        }

        return $kecamatans->values()->map(function ($district, int $index) {
            return [
                'name' => $district->nama,
                'x' => 18 + ($index * 7),
                'y' => 20 + ($index * 6),
                'villages' => $district->desa_count,
                'population' => number_format($district->desa_sum_jumlah_penduduk ?: 0, 0, ',', '.'),
            ];
        })->toArray();
    }

    private function getArticles(string $searchQuery = '', string $selectedKecamatan = ''): array
    {
        $articles = Artikel::query()
            ->when($searchQuery !== '', fn ($query) => $query->where('judul', 'like', "%{$searchQuery}%"))
            ->when($selectedKecamatan !== '', fn ($query) => $query->where('ringkasan', 'like', "%{$selectedKecamatan}%"))
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        if ($articles->isEmpty()) {
            return [
                ['title' => 'Pemutakhiran data sosial desa semester berjalan', 'area' => 'Kabupaten Lamongan', 'date' => '30 Juni 2026', 'excerpt' => 'Pemerintah Kabupaten Lamongan mengoordinasikan pembaruan data sosial untuk memperkuat ketepatan layanan publik.'],
                ['title' => 'Pelayanan administrasi desa berbasis antrean digital', 'area' => 'Kecamatan Babat', 'date' => '27 Juni 2026', 'excerpt' => 'Warga dapat memantau status pengajuan surat melalui kanal layanan mandiri tanpa harus datang berulang kali.'],
                ['title' => 'Publikasi progres pembangunan infrastruktur desa', 'area' => 'Kecamatan Paciran', 'date' => '24 Juni 2026', 'excerpt' => 'Rekapitulasi pekerjaan fisik desa dipublikasikan secara berkala untuk mendukung transparansi anggaran.'],
            ];
        }

        return $articles->map(function (Artikel $article) {
            return [
                'title' => $article->judul,
                'area' => $article->kategori ? 'Kategori: ' . $article->kategori : 'Kabupaten Lamongan',
                'date' => $article->published_at?->translatedFormat('d F Y') ?? $article->created_at->translatedFormat('d F Y'),
                'excerpt' => mb_substr($article->ringkasan, 0, 160),
            ];
        })->toArray();
    }

    private function getProducts(): array
    {
        $products = ProdukUmkm::take(8)->get();

        if ($products->isEmpty()) {
            return [
                ['name' => 'Batik Sendangduwur', 'village' => 'Sendangduwur, Paciran', 'price' => 'Rp185.000', 'status' => 'Tersedia'],
                ['name' => 'Keripik ikan laut', 'village' => 'Brondong', 'price' => 'Rp32.000', 'status' => 'Tersedia'],
                ['name' => 'Tenun rumahan', 'village' => 'Parengan, Maduran', 'price' => 'Rp210.000', 'status' => 'Kurasi'],
                ['name' => 'Sambal bandeng', 'village' => 'Deket Kulon', 'price' => 'Rp28.000', 'status' => 'Tersedia'],
            ];
        }

        return $products->map(function (ProdukUmkm $product) {
            return [
                'name' => $product->nama,
                'village' => 'UMKM desa',
                'price' => 'Rp' . number_format($product->harga, 0, ',', '.'),
                'status' => $product->status,
            ];
        })->toArray();
    }

    private function getProjects(): array
    {
        return [
            ['name' => 'Peningkatan jalan lingkungan', 'village' => 'Sukorejo', 'budget' => 'Rp420.000.000', 'progress' => 72],
            ['name' => 'Rehabilitasi saluran irigasi', 'village' => 'Karanggeneng', 'budget' => 'Rp315.000.000', 'progress' => 48],
            ['name' => 'Pembangunan posyandu terpadu', 'village' => 'Kembangbahu', 'budget' => 'Rp260.000.000', 'progress' => 86],
        ];
    }

    private function formatPopulation(int $count): string
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 2, ',', '.') . ' juta';
        }

        return number_format($count, 0, ',', '.');
    }
}
