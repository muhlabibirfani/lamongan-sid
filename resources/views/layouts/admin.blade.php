<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin SID' }} | SID Lamongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-lamongan-canvas font-sans text-lamongan-body">
    @php
        $adminNavigation = [
            'Utama' => [
                ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['label' => 'Data desa', 'route' => 'admin.desa.index'],
            ],
            'Kependudukan' => [
                ['label' => 'Penduduk', 'route' => 'admin.module.show', 'params' => ['penduduk']],
                ['label' => 'Keluarga', 'route' => 'admin.module.show', 'params' => ['keluarga']],
                ['label' => 'Kelompok rentan', 'route' => 'admin.module.show', 'params' => ['kelompok-rentan']],
            ],
            'Pelayanan' => [
                ['label' => 'Administrasi surat', 'route' => 'admin.module.show', 'params' => ['administrasi-surat']],
                ['label' => 'Layanan mandiri', 'route' => 'admin.module.show', 'params' => ['layanan-mandiri']],
                ['label' => 'Pengaduan warga', 'route' => 'admin.module.show', 'params' => ['pengaduan-warga']],
            ],
            'Publikasi' => [
                ['label' => 'Artikel', 'route' => 'admin.module.show', 'params' => ['artikel']],
                ['label' => 'Lapak UMKM', 'route' => 'admin.module.show', 'params' => ['lapak-umkm']],
                ['label' => 'Pembangunan', 'route' => 'admin.module.show', 'params' => ['pembangunan']],
                ['label' => 'Statistik', 'route' => 'admin.module.show', 'params' => ['statistik']],
            ],
        ];
    @endphp

    <div class="min-h-screen lg:grid lg:grid-cols-[280px_1fr]">
        <aside class="border-r border-lamongan-border bg-white">
            <div class="flex min-h-24 items-center gap-3 border-b border-lamongan-border px-5">
                <span class="flex h-11 w-11 items-center justify-center rounded-sid bg-lamongan-primary text-sm font-bold text-white">SID</span>
                <div>
                    <p class="font-bold text-lamongan-primary">Admin SID Lamongan</p>
                    <p class="text-xs font-medium uppercase tracking-wide text-lamongan-neutral">Operator kabupaten</p>
                </div>
            </div>
            <nav class="space-y-5 p-4 text-sm font-medium">
                @foreach ($adminNavigation as $group => $items)
                    <div>
                        <p class="px-3 text-xs font-bold uppercase tracking-wide text-lamongan-neutral">{{ $group }}</p>
                        <div class="mt-2 space-y-1">
                            @foreach ($items as $item)
                                @if ($item['route'])
                                    @php
                                        $isActive = isset($item['params'])
                                            ? request()->routeIs($item['route']) && request()->route('module') === $item['params'][0]
                                            : request()->routeIs($item['route']);
                                    @endphp
                                    <a href="{{ route($item['route'], $item['params'] ?? []) }}" class="block rounded-sid px-3 py-2.5 {{ $isActive ? 'bg-lamongan-primary text-white' : 'text-lamongan-body hover:bg-lamongan-muted hover:text-lamongan-primary' }}">{{ $item['label'] }}</a>
                                @else
                                    <span class="block rounded-sid px-3 py-2.5 text-lamongan-neutral">{{ $item['label'] }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </nav>
        </aside>
        <div>
            <header class="border-b border-lamongan-border bg-white">
                <div class="flex min-h-24 flex-wrap items-center justify-between gap-4 px-6 py-4">
                    <div>
                        <p class="text-sm font-medium text-lamongan-neutral">Panel administrasi SID</p>
                        <h1 class="text-2xl font-bold text-lamongan-primary">{{ $title ?? 'Dashboard admin' }}</h1>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <a href="{{ route('home') }}" class="sid-button-secondary">Lihat situs publik</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="sid-button" type="submit">Keluar</button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
