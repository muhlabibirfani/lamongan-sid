@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px]">
            <div class="sid-card overflow-hidden">
                <div class="border-b border-lamongan-border p-5">
                    <h1 class="text-2xl font-bold text-lamongan-primary">Peta wilayah Kabupaten Lamongan</h1>
                    <p class="mt-2 text-sm leading-6">Gunakan peta interaktif untuk memperbesar, menggeser, dan membuka wilayah Kabupaten Lamongan seperti pada Google Maps.</p>
                </div>

                <div class="h-[420px] bg-lamongan-muted sm:h-[560px]">
                    <iframe
                        class="h-full w-full border-0"
                        src="https://www.google.com/maps?q=Kabupaten%20Lamongan%2C%20Jawa%20Timur&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Peta Kabupaten Lamongan"
                    ></iframe>
                </div>
            </div>

            <aside class="space-y-4">
                <section class="sid-card p-5">
                    <h2 class="text-lg font-bold text-lamongan-primary">Ringkasan peta</h2>
                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="rounded-sid border border-lamongan-border bg-lamongan-muted p-3">
                            <p class="text-2xl font-bold text-lamongan-primary">{{ $totalDistricts }}</p>
                            <p class="text-xs">Kecamatan</p>
                        </div>
                        <div class="rounded-sid border border-lamongan-border bg-lamongan-muted p-3">
                            <p class="text-2xl font-bold text-lamongan-primary">{{ $totalDesa }}</p>
                            <p class="text-xs">Desa/kelurahan</p>
                        </div>
                    </div>
                </section>

                <section class="sid-card p-5">
                    <h2 class="text-lg font-bold text-lamongan-primary">Daftar kecamatan</h2>
                    <div class="mt-4 max-h-[520px] space-y-3 overflow-y-auto pr-1">
                        @foreach ($mapPoints as $point)
                            <a id="detail-{{ str($point['name'])->slug() }}" href="https://www.google.com/maps/search/?api=1&query=Kecamatan%20{{ urlencode($point['name']) }}%2C%20Lamongan" target="_blank" rel="noopener" class="block rounded-sid border border-lamongan-border p-3 hover:border-lamongan-primary hover:bg-lamongan-muted">
                                <div class="flex items-center justify-between gap-3">
                                    <p class="font-semibold text-lamongan-body">{{ $point['name'] }}</p>
                                    <span class="sid-badge bg-lamongan-muted text-lamongan-body">{{ $point['villages'] }} desa</span>
                                </div>
                                <p class="mt-2 text-sm text-lamongan-neutral">{{ $point['population'] }} penduduk terdata</p>
                            </a>
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </section>
@endsection
