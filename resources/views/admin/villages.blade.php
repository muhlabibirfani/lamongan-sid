@extends('layouts.admin')

@section('content')
    <section class="sid-card p-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-lamongan-primary">Data desa dan kelurahan</h2>
                <p class="mt-1 text-sm">Daftar operasional untuk operator desa, petugas kecamatan, dan admin kabupaten.</p>
            </div>
            <form class="flex gap-2">
                <input class="sid-input w-72" name="q" value="{{ $query }}" placeholder="Cari desa atau kecamatan">
                <button class="sid-button" type="submit">Filter</button>
            </form>
        </div>
        <div class="mt-5 overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="border-b border-lamongan-border text-lamongan-neutral">
                    <tr>
                        <th class="py-3 pr-4 font-semibold">Nama desa</th>
                        <th class="py-3 pr-4 font-semibold">Kecamatan</th>
                        <th class="py-3 pr-4 font-semibold">Status</th>
                        <th class="py-3 pr-4 font-semibold">Operator</th>
                        <th class="py-3 pr-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-lamongan-border">
                    @forelse ($villages as $village)
                        <tr>
                            <td class="py-4 pr-4 font-semibold text-lamongan-body">{{ $village['name'] }}</td>
                            <td class="py-4 pr-4">{{ $village['district'] }}</td>
                            <td class="py-4 pr-4">
                                <span class="sid-badge {{ $village['status'] === 'Aktif' ? 'bg-lamongan-success text-white' : 'bg-lamongan-muted text-lamongan-body' }}">{{ $village['status'] }}</span>
                            </td>
                            <td class="py-4 pr-4">{{ $village['operator'] }}</td>
                            <td class="py-4 pr-4">
                                <a href="{{ route('admin.module.show', 'data-desa') }}" class="sid-button-secondary">Kelola</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center">Belum ada data desa yang sesuai dengan filter.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
