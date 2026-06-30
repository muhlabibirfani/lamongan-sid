<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    private const MODULES = [
        'data-desa' => [
            'title' => 'Data desa',
            'group' => 'Utama',
            'description' => 'Kelola profil desa dan kelurahan, operator wilayah, status aktivasi, dan koordinasi kecamatan.',
            'metrics' => [
                ['label' => 'Desa/kelurahan', 'value' => '400+'],
                ['label' => 'Desa aktif', 'value' => '386'],
                ['label' => 'Perlu verifikasi', 'value' => '14'],
            ],
            'items' => ['Verifikasi profil desa', 'Penugasan operator', 'Pembaruan wilayah administrasi'],
        ],
        'penduduk' => [
            'title' => 'Penduduk',
            'group' => 'Kependudukan',
            'description' => 'Kelola data penduduk, pencarian biodata, status domisili, dan pembaruan data dasar warga.',
            'metrics' => [
                ['label' => 'Penduduk aktif', 'value' => '1,36 juta'],
                ['label' => 'Perlu verifikasi', 'value' => '248'],
                ['label' => 'Pembaruan bulan ini', 'value' => '1.024'],
            ],
            'items' => ['Verifikasi data ganda', 'Pembaruan alamat domisili', 'Sinkronisasi data kecamatan'],
        ],
        'keluarga' => [
            'title' => 'Keluarga',
            'group' => 'Kependudukan',
            'description' => 'Pantau kartu keluarga, kepala keluarga, alamat, dan status validasi keluarga.',
            'metrics' => [
                ['label' => 'Kartu keluarga', 'value' => '412.800'],
                ['label' => 'KK perlu validasi', 'value' => '136'],
                ['label' => 'Mutasi tercatat', 'value' => '78'],
            ],
            'items' => ['Validasi kepala keluarga', 'Perubahan alamat keluarga', 'Rekap keluarga rentan'],
        ],
        'kelompok-rentan' => [
            'title' => 'Kelompok rentan',
            'group' => 'Kependudukan',
            'description' => 'Kelola daftar prioritas sosial seperti lansia, disabilitas, balita, dan keluarga penerima bantuan.',
            'metrics' => [
                ['label' => 'Data prioritas', 'value' => '18.420'],
                ['label' => 'Butuh tindak lanjut', 'value' => '93'],
                ['label' => 'Program aktif', 'value' => '12'],
            ],
            'items' => ['Rekap stunting', 'Data lansia mandiri', 'Penerima bantuan sosial'],
        ],
        'administrasi-surat' => [
            'title' => 'Administrasi surat',
            'group' => 'Pelayanan',
            'description' => 'Kelola permohonan surat, verifikasi berkas, pencetakan, dan arsip pelayanan warga.',
            'metrics' => [
                ['label' => 'Surat diproses', 'value' => '1.284'],
                ['label' => 'Menunggu verifikasi', 'value' => '37'],
                ['label' => 'Selesai hari ini', 'value' => '84'],
            ],
            'items' => ['Surat domisili', 'Surat keterangan usaha', 'Surat pengantar umum'],
        ],
        'layanan-mandiri' => [
            'title' => 'Layanan mandiri',
            'group' => 'Pelayanan',
            'description' => 'Pantau kanal pengajuan warga, autentikasi layanan, dan status antrean permohonan.',
            'metrics' => [
                ['label' => 'Pengajuan online', 'value' => '342'],
                ['label' => 'Akun warga aktif', 'value' => '9.620'],
                ['label' => 'Respons rata-rata', 'value' => '1 hari'],
            ],
            'items' => ['Permohonan baru', 'Akun warga perlu bantuan', 'Notifikasi layanan'],
        ],
        'pengaduan-warga' => [
            'title' => 'Pengaduan warga',
            'group' => 'Pelayanan',
            'description' => 'Tindak lanjuti laporan warga, disposisi petugas, dan publikasi status penyelesaian.',
            'metrics' => [
                ['label' => 'Laporan masuk', 'value' => '128'],
                ['label' => 'Dalam proses', 'value' => '41'],
                ['label' => 'Selesai', 'value' => '87'],
            ],
            'items' => ['Infrastruktur', 'Pelayanan administrasi', 'Lingkungan dan kebersihan'],
        ],
        'artikel' => [
            'title' => 'Artikel',
            'group' => 'Publikasi',
            'description' => 'Kelola berita, pengumuman resmi, agenda desa, dan publikasi kabupaten.',
            'metrics' => [
                ['label' => 'Artikel terbit', 'value' => '316'],
                ['label' => 'Draft', 'value' => '12'],
                ['label' => 'Kontributor', 'value' => '38'],
            ],
            'items' => ['Pengumuman layanan', 'Berita desa', 'Agenda kegiatan'],
        ],
        'lapak-umkm' => [
            'title' => 'Lapak UMKM',
            'group' => 'Publikasi',
            'description' => 'Kurasi produk warga, status ketersediaan, dan katalog ekonomi desa.',
            'metrics' => [
                ['label' => 'Produk tampil', 'value' => '428'],
                ['label' => 'Menunggu kurasi', 'value' => '26'],
                ['label' => 'Pelaku UMKM', 'value' => '211'],
            ],
            'items' => ['Produk baru', 'Kurasi foto produk', 'Kategori unggulan'],
        ],
        'pembangunan' => [
            'title' => 'Pembangunan',
            'group' => 'Publikasi',
            'description' => 'Pantau kegiatan pembangunan, anggaran, progres fisik, dan dokumentasi transparansi.',
            'metrics' => [
                ['label' => 'Kegiatan aktif', 'value' => '64'],
                ['label' => 'Rata-rata progres', 'value' => '68%'],
                ['label' => 'Butuh laporan', 'value' => '9'],
            ],
            'items' => ['Progres jalan lingkungan', 'Dokumentasi lapangan', 'Rekap anggaran'],
        ],
        'statistik' => [
            'title' => 'Statistik',
            'group' => 'Publikasi',
            'description' => 'Lihat ringkasan data agregat wilayah, layanan, kependudukan, dan tren pembaruan.',
            'metrics' => [
                ['label' => 'Dataset aktif', 'value' => '24'],
                ['label' => 'Kecamatan', 'value' => '18'],
                ['label' => 'Desa/kelurahan', 'value' => '400+'],
            ],
            'items' => ['Statistik penduduk', 'Statistik layanan', 'Distribusi wilayah'],
        ],
    ];

    public function show(Request $request, string $module): View
    {
        abort_unless(isset(self::MODULES[$module]), 404);

        return view('admin.module', [
            'title' => self::MODULES[$module]['title'],
            'moduleKey' => $module,
            'module' => self::MODULES[$module],
            'query' => $request->string('q')->toString(),
        ]);
    }
}
