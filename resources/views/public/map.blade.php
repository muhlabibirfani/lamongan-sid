@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_320px]">
            <div class="sid-card min-h-[460px] p-5">
                <div class="grid h-full grid-cols-3 gap-3">
                    @foreach (array_slice($districts, 0, 18) as $district)
                        <button class="rounded-sid border border-lamongan-border bg-lamongan-muted p-3 text-left text-sm font-semibold text-lamongan-primary hover:border-lamongan-primary">{{ $district }}</button>
                    @endforeach
                </div>
            </div>
            <aside class="sid-card p-5">
                <h1 class="text-xl font-bold text-lamongan-primary">Peta wilayah</h1>
                <p class="mt-3 text-sm leading-6">Pilih kecamatan untuk melihat ringkasan desa, status data, dan kanal layanan wilayah. Integrasi peta spasial dapat dipasang pada panel utama ini.</p>
                <div class="mt-6 space-y-3">
                    <div class="sid-skeleton h-4 w-3/4"></div>
                    <div class="sid-skeleton h-4 w-1/2"></div>
                    <div class="sid-skeleton h-4 w-2/3"></div>
                </div>
            </aside>
        </div>
    </section>
@endsection
