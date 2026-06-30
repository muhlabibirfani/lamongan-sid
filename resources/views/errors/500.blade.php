@extends('layouts.public')

@section('content')
    <section class="sid-container py-16">
        <div class="sid-card mx-auto max-w-2xl p-8 text-center">
            <p class="text-sm font-semibold text-lamongan-primary">500</p>
            <h1 class="mt-3 text-3xl font-bold text-lamongan-primary">Layanan sedang dipulihkan</h1>
            <p class="mt-4 leading-7">Sistem belum dapat memproses permintaan. Petugas teknis dapat memeriksa catatan aplikasi dan mengaktifkan kembali layanan.</p>
            <a href="{{ route('home') }}" class="sid-button mt-6">Kembali ke beranda</a>
        </div>
    </section>
@endsection
