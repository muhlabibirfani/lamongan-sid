<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin SID' }} | SID Lamongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-lamongan-canvas font-sans text-lamongan-body">
    <div class="min-h-screen lg:grid lg:grid-cols-[240px_1fr]">
        <aside class="border-r border-lamongan-border bg-white">
            <div class="flex h-20 items-center gap-3 border-b border-lamongan-border px-5">
                <span class="flex h-10 w-10 items-center justify-center rounded-panel bg-lamongan-primary text-sm font-bold text-white">SID</span>
                <div>
                    <p class="font-bold text-lamongan-primary">Admin Lamongan</p>
                    <p class="text-xs text-lamongan-neutral">Panel kabupaten</p>
                </div>
            </div>
            <nav class="space-y-1 p-4 text-sm font-medium">
                @foreach ([
                    ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
                    ['label' => 'Data desa', 'route' => 'admin.desa.index'],
                ] as $item)
                    <a href="{{ route($item['route']) }}" class="block rounded-sid px-4 py-3 {{ request()->routeIs($item['route']) ? 'bg-lamongan-primary text-white' : 'text-lamongan-body hover:bg-lamongan-muted hover:text-lamongan-primary' }}">{{ $item['label'] }}</a>
                @endforeach
                @foreach (['Kependudukan', 'Administrasi surat', 'Statistik & analisis', 'Pengaduan', 'Produk UMKM', 'Anggaran desa'] as $label)
                    <span class="block rounded-sid px-4 py-3 text-lamongan-neutral">{{ $label }}</span>
                @endforeach
            </nav>
        </aside>
        <div>
            <header class="border-b border-lamongan-border bg-white">
                <div class="flex h-20 items-center justify-between px-6">
                    <div>
                        <p class="text-sm text-lamongan-neutral">Panel administrasi</p>
                        <h1 class="text-2xl font-bold text-lamongan-primary">{{ $title ?? 'Dashboard admin' }}</h1>
                    </div>
                    <div class="flex items-center gap-2">
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
