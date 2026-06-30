<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SID Kabupaten Lamongan' }} | SID Lamongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-lamongan-canvas font-sans text-lamongan-body">
    @php
        $mainNavigation = [
            ['label' => 'Beranda', 'route' => 'home'],
            [
                'label' => 'Profil Desa',
                'route' => 'statistics',
                'children' => [
                    ['label' => 'Profil Wilayah Desa', 'route' => 'statistics'],
                    ['label' => 'Sejarah Desa', 'route' => 'articles'],
                ],
            ],
            [
                'label' => 'Pemerintahan Desa',
                'route' => 'articles',
                'children' => [
                    ['label' => 'Visi dan Misi', 'route' => 'articles'],
                    ['label' => 'Pemerintah Desa', 'route' => 'articles'],
                ],
            ],
            [
                'label' => 'Data Desa',
                'route' => 'statistics',
                'children' => [
                    ['label' => 'Data Wilayah Administratif', 'route' => 'statistics'],
                    ['label' => 'Data Pendidikan', 'route' => 'statistics'],
                    ['label' => 'Data Pekerjaan', 'route' => 'statistics'],
                    ['label' => 'Data Jenis Kelamin', 'route' => 'statistics'],
                ],
            ],
            [
                'label' => 'Regulasi',
                'route' => 'development',
                'children' => [
                    ['label' => 'Produk Hukum', 'route' => 'development'],
                    ['label' => 'Informasi Publik', 'route' => 'articles'],
                ],
            ],
            ['label' => 'Peta', 'route' => 'map'],
            ['label' => 'Lapak', 'route' => 'lapak'],
            ['label' => 'Pengaduan', 'route' => 'complaints'],
        ];
    @endphp

    <header class="border-b border-lamongan-border bg-white">
        <div class="border-b border-lamongan-border bg-lamongan-primary text-white">
            <div class="sid-container flex min-h-10 flex-wrap items-center justify-center gap-x-4 gap-y-2 py-2 text-center text-xs font-medium sm:justify-between sm:text-left">
                <span>Kabupaten Lamongan, Provinsi Jawa Timur</span>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1">
                    <a href="{{ route('services') }}" class="text-white hover:text-lamongan-accent">Layanan Mandiri</a>
                    <a href="{{ route('login') }}" class="text-white hover:text-lamongan-accent">Masuk operator</a>
                </div>
            </div>
        </div>
        <div class="sid-container">
            <div class="flex min-h-20 items-center justify-between gap-4 py-3 sm:min-h-24">
                <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3 text-lamongan-body">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-sid border border-lamongan-border bg-lamongan-muted text-sm font-bold text-lamongan-primary sm:h-14 sm:w-14">SID</span>
                    <span class="min-w-0">
                        <span class="block text-base font-bold leading-tight text-lamongan-primary sm:text-xl">SID Kabupaten Lamongan</span>
                        <span class="block text-xs font-semibold leading-snug text-lamongan-body sm:text-sm">Sistem Informasi Desa dan Pelayanan Publik</span>
                        <span class="block text-xs text-lamongan-neutral">Kabupaten Lamongan, Provinsi Jawa Timur</span>
                    </span>
                </a>
            </div>
        </div>
        <div class="border-t border-lamongan-border bg-white">
            <div class="sid-container">
                <nav class="hidden flex-wrap items-center gap-1 py-2.5 text-sm font-semibold lg:flex" aria-label="Navigasi utama">
                    @foreach ($mainNavigation as $item)
                        @php
                            $isActive = request()->routeIs($item['route']);
                        @endphp
                        <div class="group relative">
                            <a href="{{ route($item['route']) }}" class="block rounded-sid px-3 py-2 {{ $isActive ? 'bg-lamongan-primary text-white' : 'text-lamongan-body hover:bg-lamongan-muted hover:text-lamongan-primary' }}">{{ $item['label'] }}</a>
                            @if (! empty($item['children']))
                                <div class="invisible absolute left-0 top-full z-20 min-w-64 rounded-sid border border-lamongan-border bg-white p-2 opacity-0 shadow-lg transition group-hover:visible group-hover:opacity-100">
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ route($child['route']) }}" class="block rounded-sid px-3 py-2 text-sm text-lamongan-body hover:bg-lamongan-muted hover:text-lamongan-primary">{{ $child['label'] }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </nav>
                <nav class="grid grid-cols-2 gap-2 py-3 text-xs font-semibold sm:grid-cols-4 sm:text-sm lg:hidden" aria-label="Navigasi utama mobile">
                    @foreach ($mainNavigation as $item)
                        <a href="{{ route($item['route']) }}" class="rounded-sid border border-lamongan-border px-2 py-2 text-center leading-snug {{ request()->routeIs($item['route']) ? 'bg-lamongan-primary text-white' : 'bg-white text-lamongan-body' }}">{{ $item['label'] }}</a>
                    @endforeach
                </nav>
            </div>
        </div>
        <div class="border-t border-lamongan-border bg-lamongan-muted">
            <div class="sid-container flex min-h-11 items-center gap-3 overflow-hidden text-sm">
                <span class="shrink-0 rounded-sid bg-lamongan-primary px-3 py-1.5 text-xs font-bold uppercase tracking-wide text-white">Info</span>
                <div class="min-w-0 flex-1 overflow-hidden">
                    <p class="sid-marquee text-lamongan-body">Ini contoh teks berjalan. Isi dengan tulisan yang menampilkan ciri, agenda, atau kegiatan penting desa anda. &nbsp;&nbsp;&bull;&nbsp;&nbsp; Gunakan menu layanan mandiri untuk pengajuan surat dan pengecekan status pelayanan.</p>
                </div>
            </div>
        </div>
    </header>

    <main>
        @if (! empty($breadcrumbs))
            <div class="sid-container py-4">
                <nav class="text-sm" aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a class="text-lamongan-primary" href="{{ route('home') }}">Beranda</a></li>
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="text-lamongan-neutral">/</li>
                            <li class="font-medium text-lamongan-body">{{ $breadcrumb['label'] }}</li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-16 border-t border-lamongan-border bg-white">
        <div class="sid-container grid gap-8 py-10 md:grid-cols-[1.3fr_1fr_1fr]">
            <div>
                <p class="text-lg font-bold text-lamongan-primary">SID Kabupaten Lamongan</p>
                <p class="mt-3 max-w-xl text-sm leading-6">Portal layanan dan informasi desa di bawah koordinasi Pemerintah Kabupaten Lamongan untuk publikasi data, pelayanan administrasi, pengaduan, dan transparansi pembangunan.</p>
            </div>
            <div class="text-sm leading-7">
                <p class="font-semibold text-lamongan-body">Kantor pelayanan kabupaten</p>
                <p>Jl. K.H. Ahmad Dahlan No. 1, Lamongan</p>
                <p>Senin-Jumat, 08.00-15.30 WIB</p>
                <p>Kontak darurat: 112</p>
            </div>
            <div class="text-sm leading-7">
                <p class="font-semibold text-lamongan-body">Modul utama</p>
                <a class="block text-lamongan-primary" href="{{ route('articles') }}">Berita dan pengumuman</a>
                <a class="block text-lamongan-primary" href="{{ route('services') }}">Layanan mandiri</a>
                <a class="block text-lamongan-primary" href="{{ route('complaints') }}">Pengaduan warga</a>
                <a class="block text-lamongan-primary" href="{{ route('development') }}">Transparansi pembangunan</a>
            </div>
        </div>
    </footer>
</body>
</html>
