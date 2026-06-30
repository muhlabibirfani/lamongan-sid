@extends('layouts.public')

@section('content')
    <section class="sid-container py-8">
        <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <h1 class="text-3xl font-bold text-lamongan-primary">Layanan mandiri warga</h1>
                <p class="mt-3 leading-7">Ajukan surat keterangan, pantau status permohonan, dan terima informasi tindak lanjut dari operator desa tanpa membuka data pribadi di halaman publik.</p>
            </div>
            <div class="sid-card p-6">
                <form class="grid gap-4">
                    <select class="sid-input"><option>Surat keterangan domisili</option><option>Surat keterangan usaha</option><option>Surat pengantar umum</option></select>
                    <input class="sid-input" placeholder="Nama pemohon">
                    <input class="sid-input" placeholder="Desa atau kelurahan">
                    <textarea class="sid-input min-h-32" placeholder="Keperluan pengajuan"></textarea>
                    <button class="sid-button w-fit" type="button">Ajukan permohonan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
