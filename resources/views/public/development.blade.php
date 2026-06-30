@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <h1 class="text-3xl font-bold text-lamongan-primary">Transparansi pembangunan desa</h1>
        <div class="mt-6 grid gap-4">
            @foreach ($projects as $project)
                <article class="sid-card p-5">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h2 class="font-semibold text-lamongan-body">{{ $project['name'] }}</h2>
                            <p class="mt-1 text-sm">{{ $project['village'] }} · {{ $project['budget'] }}</p>
                        </div>
                        <span class="sid-badge bg-lamongan-success text-white">Berjalan</span>
                    </div>
                    <div class="mt-4 h-3 overflow-hidden rounded-full bg-lamongan-muted">
                        <div class="h-full rounded-full bg-lamongan-primary" style="width: {{ $project['progress'] }}%"></div>
                    </div>
                    <p class="mt-2 text-sm font-medium text-lamongan-primary">{{ $project['progress'] }}% selesai</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
