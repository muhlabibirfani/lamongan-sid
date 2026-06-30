@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <h1 class="text-3xl font-bold text-lamongan-primary">Statistik agregat kabupaten</h1>
        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @foreach ($stats as $stat)
                <div class="sid-card p-5">
                    <p class="text-3xl font-bold text-lamongan-primary">{{ $stat['value'] }}</p>
                    <p class="mt-2 text-sm">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6 sid-card p-5">
            <h2 class="font-semibold text-lamongan-body">Distribusi layanan per kecamatan</h2>
            <div class="mt-5 space-y-4">
                @foreach (array_slice($districts, 0, 6) as $index => $district)
                    <div>
                        <div class="mb-1 flex justify-between text-sm"><span>{{ $district }}</span><span>{{ 68 + $index * 4 }}%</span></div>
                        <div class="h-3 rounded-full bg-lamongan-muted"><div class="h-3 rounded-full {{ $index % 2 ? 'bg-lamongan-secondary' : 'bg-lamongan-primary' }}" style="width: {{ 68 + $index * 4 }}%"></div></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
