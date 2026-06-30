@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <h1 class="text-3xl font-bold text-lamongan-primary">Lapak UMKM desa</h1>
        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($products as $product)
                <article class="sid-card overflow-hidden">
                    <div class="flex aspect-[4/3] items-center justify-center bg-lamongan-muted text-sm text-lamongan-neutral">Foto produk</div>
                    <div class="p-5">
                        <span class="sid-badge {{ $product['status'] === 'Tersedia' ? 'bg-lamongan-success text-white' : 'bg-lamongan-muted text-lamongan-body' }}">{{ $product['status'] }}</span>
                        <h2 class="mt-3 font-semibold text-lamongan-body">{{ $product['name'] }}</h2>
                        <p class="mt-1 text-sm">{{ $product['village'] }}</p>
                        <p class="mt-4 font-bold text-lamongan-primary">{{ $product['price'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
