@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <div class="sid-card p-5">
            <form class="grid gap-3 md:grid-cols-[1fr_220px_160px]">
                <input class="sid-input" name="q" placeholder="Cari berita atau pengumuman">
                <select class="sid-input" name="kecamatan">
                    <option>Semua kecamatan</option>
                    @foreach ($districts as $district)
                        <option>{{ $district }}</option>
                    @endforeach
                </select>
                <button class="sid-button" type="submit">Terapkan filter</button>
            </form>
        </div>
        <div class="mt-6 grid gap-4">
            @forelse ($articles as $article)
                <article class="sid-card p-5">
                    <p class="text-xs font-semibold text-lamongan-primary">{{ $article['area'] }} · {{ $article['date'] }}</p>
                    <h1 class="mt-2 text-xl font-semibold text-lamongan-body">{{ $article['title'] }}</h1>
                    <p class="mt-3 text-sm leading-6">{{ $article['excerpt'] }}</p>
                </article>
            @empty
                <div class="sid-card p-8 text-center">Belum ada artikel yang sesuai dengan filter.</div>
            @endforelse
        </div>
    </section>
@endsection
