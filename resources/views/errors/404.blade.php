@extends('layouts.public')

@section('content')
    <section class="sid-container py-16">
        <div class="sid-card mx-auto max-w-2xl p-8 text-center">
            <p class="text-sm font-semibold text-lamongan-primary">404</p>
            <h1 class="mt-3 text-3xl font-bold text-lamongan-primary">Halaman tidak ditemukan</h1>
            <p class="mt-4 leading-7">Alamat yang dibuka tidak tersedia atau sudah dipindahkan. Silakan kembali ke beranda untuk melanjutkan akses layanan.</p>
            <a href="{{ route('home') }}" class="sid-button mt-6">Kembali ke beranda</a>
        </div>
    </section>
@endsection
