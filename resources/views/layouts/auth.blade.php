<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Login Operator' }} | SID Lamongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-lamongan-canvas font-sans text-lamongan-body">
    <main class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">
            <div class="mb-6 flex items-center justify-between rounded-panel border border-lamongan-border bg-white px-5 py-4 shadow-sm">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-lamongan-neutral">Panel akses</p>
                    <h1 class="text-lg font-bold text-lamongan-primary">Login Operator</h1>
                </div>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-lamongan-primary hover:text-lamongan-secondary">Kembali ke situs</a>
            </div>

            @yield('content')
        </div>
    </main>
</body>
</html>
