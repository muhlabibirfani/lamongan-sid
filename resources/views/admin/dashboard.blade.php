@extends('layouts.admin')

@section('content')
    <section class="mb-6 rounded-sid border border-lamongan-border bg-white p-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-lamongan-neutral">Ringkasan operasional</p>
                <h2 class="mt-1 text-xl font-bold text-lamongan-primary">Pusat kendali data dan layanan desa</h2>
                <p class="mt-2 max-w-3xl text-sm leading-6">Pantau konsolidasi data desa, antrean pelayanan, publikasi informasi, dan tindak lanjut pengaduan dari satu panel operator.</p>
            </div>
            <a href="{{ route('admin.desa.index') }}" class="sid-button">Kelola data desa</a>
        </div>
    </section>

    <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($cards as $card)
            <div class="sid-card p-5">
                <p class="text-sm font-medium text-lamongan-neutral">{{ $card['label'] }}</p>
                <p class="mt-3 text-3xl font-bold text-lamongan-primary">{{ $card['value'] }}</p>
                <p class="mt-2 text-sm">{{ $card['note'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="mt-6 grid gap-6 xl:grid-cols-[1fr_380px]">
        <div class="sid-card p-5">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-lg font-bold text-lamongan-primary">Distribusi data wilayah</h2>
                <span class="sid-badge bg-lamongan-success text-white">Aktif</span>
            </div>
            <div class="mt-6 space-y-4">
                @foreach ($districts as $district)
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span>{{ $district['name'] }}</span>
                            <span>{{ $district['population'] }} penduduk</span>
                        </div>
                        <div class="h-3 rounded-full bg-lamongan-muted">
                            <div class="h-3 rounded-full {{ $loop->odd ? 'bg-lamongan-primary' : 'bg-lamongan-secondary' }}" style="width: {{ 55 + ($loop->index * 8) }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="sid-card p-5">
            <h2 class="text-lg font-bold text-lamongan-primary">Antrian prioritas operator</h2>
            <div class="mt-5 space-y-3">
                @foreach (['Verifikasi surat domisili', 'Validasi data ganda', 'Rekap stunting kecamatan', 'Tinjau pengaduan infrastruktur'] as $task)
                    <div class="rounded-sid border border-lamongan-border p-3 text-sm">
                        <p class="font-semibold text-lamongan-body">{{ $task }}</p>
                        <p class="mt-1 text-lamongan-neutral">Menunggu tindak lanjut petugas.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['label' => 'Kependudukan', 'text' => 'Penduduk, keluarga, mutasi, dan data sosial dasar.'],
            ['label' => 'Administrasi surat', 'text' => 'Permohonan, verifikasi, cetak, dan arsip layanan.'],
            ['label' => 'Informasi publik', 'text' => 'Artikel, pengumuman, lapak UMKM, dan galeri desa.'],
            ['label' => 'Transparansi', 'text' => 'Pembangunan, anggaran, statistik, dan pengaduan warga.'],
        ] as $module)
            <div class="sid-card p-5">
                <p class="font-semibold text-lamongan-primary">{{ $module['label'] }}</p>
                <p class="mt-2 text-sm leading-6">{{ $module['text'] }}</p>
                <span class="mt-4 inline-flex text-xs font-semibold text-lamongan-neutral">Modul siap dikembangkan</span>
            </div>
        @endforeach
    </section>
@endsection
