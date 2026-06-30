<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SID Kabupaten Lamongan' }} | SID Lamongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-lamongan-canvas font-sans text-lamongan-body">
    <header class="border-b border-lamongan-border bg-white">
        <div class="sid-container">
            <div class="flex min-h-20 items-center justify-between gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-lamongan-body">
                    <span class="flex h-11 w-11 items-center justify-center rounded-panel border border-lamongan-border bg-lamongan-muted text-sm font-bold text-lamongan-primary">LM</span>
                    <span>
                        <span class="block text-base font-bold text-lamongan-primary">SID Kabupaten Lamongan</span>
                        <span class="block text-xs text-lamongan-neutral">Pemerintah Kabupaten Lamongan</span>
                    </span>
                </a>
                <nav class="hidden items-center gap-1 text-sm font-medium lg:flex" aria-label="Navigasi utama">
                    @foreach ([
                        'home' => 'Beranda',
                        'articles' => 'Artikel',
                        'lapak' => 'Lapak',
                        'map' => 'Peta',
                        'development' => 'Pembangunan',
                        'statistics' => 'Statistik',
                        'complaints' => 'Pengaduan',
                        'services' => 'Layanan mandiri',
                    ] as $route => $label)
                        <a href="{{ route($route) }}" class="rounded-sid px-3 py-2 {{ request()->routeIs($route) ? 'bg-lamongan-primary text-white' : 'text-lamongan-body hover:bg-lamongan-muted hover:text-lamongan-primary' }}">{{ $label }}</a>
                    @endforeach
                </nav>
                <a href="{{ route('services') }}" class="sid-button hidden sm:inline-flex">Ajukan layanan</a>
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
                <p class="font-semibold text-lamongan-body">Kantor pelayanan</p>
                <p>Jl. K.H. Ahmad Dahlan No. 1, Lamongan</p>
                <p>Senin-Jumat, 08.00-15.30 WIB</p>
                <p>Kontak darurat: 112</p>
            </div>
            <div class="text-sm leading-7">
                <p class="font-semibold text-lamongan-body">Kanal resmi</p>
                <a class="block text-lamongan-primary" href="{{ route('articles') }}">Berita dan pengumuman</a>
                <a class="block text-lamongan-primary" href="{{ route('complaints') }}">Pengaduan warga</a>
                <a class="block text-lamongan-primary" href="{{ route('development') }}">Transparansi pembangunan</a>
            </div>
        </div>
    </footer>
</body>
</html>
