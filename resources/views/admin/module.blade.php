@extends('layouts.admin')

@section('content')
    <section class="rounded-sid border border-lamongan-border bg-white p-5">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-lamongan-neutral">{{ $module['group'] }}</p>
                <h2 class="mt-1 text-2xl font-bold text-lamongan-primary">{{ $module['title'] }}</h2>
                <p class="mt-2 max-w-3xl text-sm leading-6">{{ $module['description'] }}</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="sid-button-secondary">Kembali dashboard</a>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-3">
        @foreach ($module['metrics'] as $metric)
            <div class="sid-card p-5">
                <p class="text-sm font-medium text-lamongan-neutral">{{ $metric['label'] }}</p>
                <p class="mt-3 text-3xl font-bold text-lamongan-primary">{{ $metric['value'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="mt-6 grid gap-6 xl:grid-cols-[1fr_360px]">
        <div class="sid-card p-5">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-lamongan-primary">Daftar kerja modul</h3>
                    <p class="mt-1 text-sm">Tampilan awal agar navigasi admin sudah aktif dan siap dikembangkan ke CRUD penuh.</p>
                </div>
                <form class="flex gap-2">
                    <input class="sid-input w-72" name="q" value="{{ $query }}" placeholder="Cari data modul">
                    <button class="sid-button" type="submit">Filter</button>
                </form>
            </div>

            <div class="mt-5 overflow-x-auto">
                <table class="w-full min-w-[680px] text-left text-sm">
                    <thead class="border-b border-lamongan-border text-lamongan-neutral">
                        <tr>
                            <th class="py-3 pr-4 font-semibold">Nama pekerjaan</th>
                            <th class="py-3 pr-4 font-semibold">Status</th>
                            <th class="py-3 pr-4 font-semibold">Prioritas</th>
                            <th class="py-3 pr-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-lamongan-border">
                        @foreach ($module['items'] as $item)
                            <tr>
                                <td class="py-4 pr-4 font-semibold text-lamongan-body">{{ $item }}</td>
                                <td class="py-4 pr-4">
                                    <span class="sid-badge bg-lamongan-muted text-lamongan-body">Dalam antrean</span>
                                </td>
                                <td class="py-4 pr-4">{{ $loop->first ? 'Tinggi' : 'Normal' }}</td>
                                <td class="py-4 pr-4">
                                    <a href="{{ route('admin.module.show', $moduleKey) }}" class="sid-button-secondary">Buka</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <aside class="sid-card p-5">
            <h3 class="text-lg font-bold text-lamongan-primary">Status implementasi</h3>
            <div class="mt-5 space-y-3 text-sm leading-6">
                <div class="rounded-sid border border-lamongan-border bg-lamongan-muted p-4">
                    <p class="font-semibold text-lamongan-body">Navigasi aktif</p>
                    <p class="mt-1 text-lamongan-neutral">Menu ini sudah bisa diklik dari sidebar admin.</p>
                </div>
                <div class="rounded-sid border border-lamongan-border p-4">
                    <p class="font-semibold text-lamongan-body">Tahap berikutnya</p>
                    <p class="mt-1 text-lamongan-neutral">Form tambah, edit, hapus, dan koneksi data asli dapat ditambahkan per modul.</p>
                </div>
            </div>
        </aside>
    </section>
@endsection
