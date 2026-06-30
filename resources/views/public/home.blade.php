@extends('layouts.public')

@section('content')
    <section class="bg-white">
        <div class="sid-container grid gap-5 py-5 xl:grid-cols-[minmax(0,1fr)_340px] 2xl:grid-cols-[minmax(0,1fr)_380px]">
            <div class="overflow-hidden rounded-sid border border-lamongan-border bg-lamongan-muted">
                <div class="grid min-h-[260px] content-center bg-lamongan-primary p-5 text-white sm:min-h-[300px] sm:p-6 lg:min-h-[330px] lg:p-8">
                    <span class="sid-badge w-fit bg-white text-lamongan-primary">Berita Desa</span>
                    <h1 class="mt-4 max-w-4xl text-2xl font-bold leading-tight sm:text-3xl lg:text-5xl">Portal data, layanan, dan informasi desa Kabupaten Lamongan</h1>
                    <p class="mt-4 max-w-2xl text-sm leading-6 text-white/90 md:text-base">Akses data desa, pengajuan surat, lapak UMKM, pengaduan warga, dan progres pembangunan dalam satu portal resmi.</p>
                    <div class="mt-6 grid gap-3 sm:flex sm:flex-wrap">
                        <a href="{{ route('articles') }}" class="inline-flex items-center justify-center rounded-sid bg-white px-4 py-2.5 text-sm font-semibold text-lamongan-primary hover:bg-lamongan-muted">Baca berita terbaru</a>
                        <a href="{{ route('statistics') }}" class="inline-flex items-center justify-center rounded-sid border border-white/70 px-4 py-2.5 text-sm font-semibold text-white hover:bg-white/10">Lihat data desa</a>
                    </div>
                </div>
            </div>

            <aside class="grid gap-4 md:grid-cols-3 xl:block xl:space-y-4">
                <div class="sid-card p-5">
                    <h2 class="text-lg font-bold text-lamongan-primary">Menu warga</h2>
                    <div class="mt-4 grid gap-2 sm:grid-cols-2 md:grid-cols-1">
                        @foreach ([
                            ['label' => 'Layanan mandiri', 'route' => 'services'],
                            ['label' => 'Pengaduan warga', 'route' => 'complaints'],
                            ['label' => 'Peta wilayah', 'route' => 'map'],
                            ['label' => 'Lapak UMKM', 'route' => 'lapak'],
                        ] as $menu)
                            <a href="{{ route($menu['route']) }}" class="rounded-sid border border-lamongan-border px-4 py-3 text-sm font-semibold text-lamongan-body hover:border-lamongan-primary hover:text-lamongan-primary">{{ $menu['label'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="sid-card p-5">
                    <h2 class="text-lg font-bold text-lamongan-primary">Panel operator</h2>
                    <p class="mt-2 text-sm leading-6">Masuk untuk mengelola data desa, artikel, layanan, dan modul administrasi.</p>
                    <a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="sid-button mt-4 w-full">
                        {{ auth()->check() ? 'Buka dashboard admin' : 'Login admin' }}
                    </a>
                </div>
                <div class="sid-card p-5">
                    <h2 class="text-lg font-bold text-lamongan-primary">Statistik singkat</h2>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        @foreach (array_slice($stats, 0, 4) as $stat)
                            <div class="rounded-sid border border-lamongan-border bg-lamongan-muted p-3">
                                <p class="text-xl font-bold text-lamongan-primary">{{ $stat['value'] }}</p>
                                <p class="mt-1 text-xs">{{ $stat['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="sid-container grid gap-6 py-6 xl:grid-cols-[minmax(0,1fr)_340px] 2xl:grid-cols-[minmax(0,1fr)_380px]">
        <main class="space-y-8">
            <section>
                <div class="flex flex-wrap items-end justify-between gap-3 border-b border-lamongan-border pb-3">
                    <div>
                        <h2 class="text-2xl font-bold text-lamongan-primary">Artikel terkini</h2>
                        <p class="mt-1 text-sm">Informasi terbaru dari desa, kecamatan, dan kabupaten.</p>
                    </div>
                    <a href="{{ route('articles') }}" class="sid-button-secondary w-full sm:w-auto">Arsip artikel</a>
                </div>

                <div class="mt-5 space-y-4">
                    @foreach ($articles as $article)
                        <article class="sid-card overflow-hidden md:grid md:grid-cols-[220px_1fr]">
                            <div class="flex min-h-40 items-center justify-center bg-lamongan-muted text-sm font-semibold text-lamongan-neutral">Gambar Artikel</div>
                            <div class="p-5">
                                <p class="text-xs font-semibold text-lamongan-primary">{{ $article['area'] }} · {{ $article['date'] }}</p>
                                <h3 class="mt-2 text-xl font-bold text-lamongan-body">{{ $article['title'] }}</h3>
                                <p class="mt-3 text-sm leading-6">{{ $article['excerpt'] }}</p>
                                <a href="{{ route('articles') }}" class="mt-4 inline-flex text-sm font-semibold text-lamongan-primary hover:text-lamongan-secondary">Baca selengkapnya</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <section>
                <div class="flex flex-wrap items-end justify-between gap-3 border-b border-lamongan-border pb-3">
                    <div>
                        <h2 class="text-2xl font-bold text-lamongan-primary">Pembangunan desa</h2>
                        <p class="mt-1 text-sm">Transparansi progres dan anggaran kegiatan.</p>
                    </div>
                    <a href="{{ route('development') }}" class="sid-button-secondary w-full sm:w-auto">Lihat semua</a>
                </div>
                <div class="mt-5 grid gap-4 md:grid-cols-3">
                    @foreach ($projects as $project)
                        <article class="sid-card p-5">
                            <h3 class="font-bold text-lamongan-body">{{ $project['name'] }}</h3>
                            <p class="mt-1 text-sm text-lamongan-neutral">{{ $project['village'] }} · {{ $project['budget'] }}</p>
                            <div class="mt-4 h-3 overflow-hidden rounded-full bg-lamongan-muted">
                                <div class="h-full rounded-full bg-lamongan-primary" style="width: {{ $project['progress'] }}%"></div>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-lamongan-primary">{{ $project['progress'] }}% selesai</p>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>

        <aside class="grid gap-5 md:grid-cols-3 xl:block xl:space-y-5">
            <section class="sid-card p-5">
                <h2 class="text-lg font-bold text-lamongan-primary">Aparatur desa</h2>
                <div class="mt-4 space-y-3">
                    @foreach ([
                        ['name' => 'Kepala Desa', 'role' => 'Pimpinan pemerintah desa'],
                        ['name' => 'Sekretaris Desa', 'role' => 'Administrasi dan tata usaha'],
                        ['name' => 'Operator SID', 'role' => 'Pengelola sistem informasi'],
                    ] as $person)
                        <div class="flex gap-3 rounded-sid border border-lamongan-border p-3">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-sid bg-lamongan-muted text-xs font-bold text-lamongan-primary">Foto</div>
                            <div>
                                <p class="font-semibold text-lamongan-body">{{ $person['name'] }}</p>
                                <p class="text-xs text-lamongan-neutral">{{ $person['role'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="sid-card p-5">
                <h2 class="text-lg font-bold text-lamongan-primary">Peta wilayah</h2>
                <div class="mt-4 aspect-[4/3] overflow-hidden rounded-sid border border-lamongan-border bg-lamongan-muted">
                    <iframe
                        class="h-full w-full border-0"
                        src="https://www.google.com/maps?q=Kabupaten%20Lamongan%2C%20Jawa%20Timur&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Preview peta Kabupaten Lamongan"
                    ></iframe>
                </div>
                <a href="{{ route('map') }}" class="sid-button-secondary mt-4 w-full">Buka peta</a>
            </section>

            <section class="sid-card p-5">
                <h2 class="text-lg font-bold text-lamongan-primary">Lapak UMKM</h2>
                <div class="mt-4 space-y-3">
                    @foreach (array_slice($products, 0, 3) as $product)
                        <a href="{{ route('lapak') }}" class="block rounded-sid border border-lamongan-border p-3 hover:border-lamongan-primary">
                            <p class="font-semibold text-lamongan-body">{{ $product['name'] }}</p>
                            <p class="mt-1 text-xs text-lamongan-neutral">{{ $product['village'] }}</p>
                            <p class="mt-2 text-sm font-bold text-lamongan-primary">{{ $product['price'] }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        </aside>
    </section>
@endsection
