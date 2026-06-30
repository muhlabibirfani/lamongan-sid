@extends('layouts.public')

@section('content')
    <section class="bg-white">
        <div class="sid-container grid gap-10 py-12 lg:grid-cols-[1.1fr_0.9fr] lg:py-16">
            <div>
                <span class="sid-badge bg-lamongan-muted text-lamongan-primary">Sistem Informasi Desa Terpadu</span>
                <h1 class="mt-5 max-w-3xl text-4xl font-bold leading-tight text-lamongan-primary md:text-5xl">Layanan publik desa Kabupaten Lamongan yang terpadu dan transparan</h1>
                <p class="mt-5 max-w-2xl text-base leading-7">Akses informasi desa, pengajuan surat, lapak UMKM, pengaduan warga, dan pemantauan pembangunan dalam satu portal resmi yang mencakup 18 kecamatan dan lebih dari 400 desa atau kelurahan.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('services') }}" class="sid-button">Mulai layanan mandiri</a>
                    <a href="{{ route('complaints') }}" class="sid-button-secondary">Lacak pengaduan</a>
                </div>
            </div>
            <div class="sid-card p-5">
                <div class="grid grid-cols-2 gap-3">
                    @foreach ($stats as $stat)
                        <div class="rounded-sid border border-lamongan-border bg-lamongan-muted p-4">
                            <p class="text-2xl font-bold text-lamongan-primary">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-sm">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 rounded-sid border border-lamongan-border p-4">
                    <p class="text-sm font-semibold text-lamongan-body">Cakupan kecamatan</p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach (array_slice($districts, 0, 9) as $district)
                            <span class="sid-badge bg-lamongan-muted text-lamongan-body">{{ $district }}</span>
                        @endforeach
                        <span class="sid-badge bg-lamongan-accent text-lamongan-body">9 kecamatan lainnya</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sid-container py-12">
        <div class="grid gap-4 md:grid-cols-4">
            @foreach ([
                ['label' => 'Artikel', 'route' => 'articles', 'text' => 'Berita dan pengumuman desa.'],
                ['label' => 'Lapak', 'route' => 'lapak', 'text' => 'Produk UMKM terkurasi.'],
                ['label' => 'Pembangunan', 'route' => 'development', 'text' => 'APBDes dan progres proyek.'],
                ['label' => 'Statistik', 'route' => 'statistics', 'text' => 'Agregat penduduk dan layanan.'],
            ] as $module)
                <a href="{{ route($module['route']) }}" class="sid-card block p-5 hover:border-lamongan-primary">
                    <p class="font-semibold text-lamongan-primary">{{ $module['label'] }}</p>
                    <p class="mt-2 text-sm leading-6">{{ $module['text'] }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="sid-container py-6">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-lamongan-primary">Berita terbaru</h2>
                <p class="mt-2 text-sm">Informasi resmi dari kabupaten, kecamatan, dan desa.</p>
            </div>
            <a href="{{ route('articles') }}" class="sid-button-secondary">Lihat semua</a>
        </div>
        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach ($articles as $article)
                <article class="sid-card p-5">
                    <p class="text-xs font-semibold text-lamongan-primary">{{ $article['area'] }} · {{ $article['date'] }}</p>
                    <h3 class="mt-3 text-lg font-semibold text-lamongan-body">{{ $article['title'] }}</h3>
                    <p class="mt-3 text-sm leading-6">{{ $article['excerpt'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="sid-container py-12">
        <div class="sid-card p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-lamongan-primary">Galeri kegiatan dinas</h2>
                    <p class="mt-2 text-sm">Dokumentasi resmi dapat ditambahkan tanpa mengubah rancangan halaman.</p>
                </div>
                <span class="sid-badge bg-lamongan-muted text-lamongan-body">Belum ada foto</span>
            </div>
            <div class="mt-6 grid gap-4 md:grid-cols-3">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex aspect-[4/3] items-center justify-center rounded-sid border border-dashed border-lamongan-border bg-lamongan-muted p-6 text-center text-sm">
                        Slot foto kegiatan resmi siap diisi dengan rasio tampilan konsisten.
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
