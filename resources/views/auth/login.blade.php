@extends('layouts.public')

@section('content')
    <section class="sid-container py-16">
        <div class="sid-card mx-auto max-w-md p-6">
            <h1 class="text-2xl font-bold text-lamongan-primary">Masuk panel admin</h1>
            <p class="mt-2 text-sm leading-6">Masuk menggunakan akun operator desa, petugas kecamatan, atau admin kabupaten yang telah terdaftar.</p>

            @if (session('status'))
                <div class="mt-4 rounded-sid border border-lamongan-border bg-lamongan-muted px-4 py-3 text-sm text-lamongan-body">
                    {{ session('status') }}
                </div>
            @endif

            <form class="mt-6 grid gap-4" method="POST" action="{{ route('login.store') }}">
                @csrf
                <div>
                    <label class="mb-1 block text-sm font-semibold text-lamongan-body" for="email">Alamat surel</label>
                    <input class="sid-input" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="admin@lamongan.go.id">
                    @error('email')
                        <p class="mt-2 text-sm text-lamongan-body">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-lamongan-body" for="password">Kata sandi</label>
                    <input class="sid-input" id="password" name="password" type="password" autocomplete="current-password" required placeholder="Masukkan kata sandi">
                    @error('password')
                        <p class="mt-2 text-sm text-lamongan-body">{{ $message }}</p>
                    @enderror
                </div>
                <label class="flex items-center gap-2 text-sm">
                    <input class="h-4 w-4 rounded border-lamongan-border text-lamongan-primary focus:ring-lamongan-primary" type="checkbox" name="remember" value="1">
                    <span>Ingat sesi masuk</span>
                </label>
                <button class="sid-button" type="submit">Masuk</button>
            </form>
            <form class="mt-3" method="POST" action="{{ route('login.demo') }}">
                @csrf
                <button class="sid-button-secondary w-full" type="submit">Masuk sebagai admin demo</button>
            </form>
            <div class="mt-5 rounded-sid border border-lamongan-border bg-lamongan-muted p-4 text-sm leading-6">
                <p class="font-semibold text-lamongan-body">Akun uji admin kabupaten</p>
                <p>Surel: admin@lamongan.go.id</p>
                <p>Kata sandi: password123</p>
            </div>
        </div>
    </section>
@endsection
