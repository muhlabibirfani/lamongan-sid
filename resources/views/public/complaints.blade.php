@extends('layouts.public')

@section('content')
    <section class="sid-container grid gap-6 py-8 lg:grid-cols-[1fr_360px]">
        <div class="sid-card p-6">
            <h1 class="text-3xl font-bold text-lamongan-primary">Pengaduan warga</h1>
            <form class="mt-6 grid gap-4">
                <div class="grid gap-4 md:grid-cols-2">
                    <input class="sid-input" name="nama" placeholder="Nama lengkap">
                    <input class="sid-input" name="kontak" placeholder="Nomor telepon atau surel">
                    <select class="sid-input" name="kecamatan"><option>Pilih kecamatan</option>@foreach ($districts as $district)<option>{{ $district }}</option>@endforeach</select>
                    <input class="sid-input" name="desa" placeholder="Desa atau kelurahan">
                </div>
                <select class="sid-input" name="kategori"><option>Administrasi layanan</option><option>Infrastruktur</option><option>Data kependudukan</option></select>
                <textarea class="sid-input min-h-36" name="uraian" placeholder="Uraikan pengaduan secara jelas"></textarea>
                <button class="sid-button w-fit" type="button">Kirim pengaduan</button>
            </form>
        </div>
        <aside class="sid-card p-6">
            <h2 class="text-xl font-bold text-lamongan-primary">Lacak status</h2>
            <div class="mt-4 flex gap-2">
                <input class="sid-input" placeholder="Nomor tiket">
                <button class="sid-button" type="button">Lacak</button>
            </div>
            <div class="mt-6 space-y-3 text-sm">
                <p><span class="font-semibold text-lamongan-body">Pending:</span> laporan diterima.</p>
                <p><span class="font-semibold text-lamongan-body">Diproses:</span> petugas menindaklanjuti.</p>
                <p><span class="font-semibold text-lamongan-body">Selesai:</span> tindak lanjut dipublikasikan.</p>
            </div>
        </aside>
    </section>
@endsection
