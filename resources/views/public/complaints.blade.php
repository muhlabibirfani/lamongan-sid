@extends('layouts.public')

@section('content')
    <section class="sid-container grid gap-6 py-8 lg:grid-cols-[1fr_360px]">
        <div class="sid-card p-6">
            <h1 class="text-3xl font-bold text-lamongan-primary">Pengaduan warga</h1>
            @if (session('status'))
                <div class="mt-4 rounded-sid border border-lamongan-success bg-lamongan-success/10 p-4 text-sm text-lamongan-primary">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('complaints.store') }}" method="POST" class="mt-6 grid gap-4">
                @csrf
                <div class="grid gap-4 md:grid-cols-2">
                    <input class="sid-input" name="nama" placeholder="Nama lengkap" value="{{ old('nama') }}">
                    <input class="sid-input" name="kontak" placeholder="Nomor telepon atau surel" value="{{ old('kontak') }}">
                    <select class="sid-input" name="kecamatan">
                        <option value="">Pilih kecamatan</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district }}" {{ old('kecamatan') === $district ? 'selected' : '' }}>{{ $district }}</option>
                        @endforeach
                    </select>
                    <input class="sid-input" name="desa" placeholder="Desa atau kelurahan" value="{{ old('desa') }}">
                </div>

                <select class="sid-input" name="kategori">
                    <option value="Administrasi layanan" {{ old('kategori') === 'Administrasi layanan' ? 'selected' : '' }}>Administrasi layanan</option>
                    <option value="Infrastruktur" {{ old('kategori') === 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                    <option value="Data kependudukan" {{ old('kategori') === 'Data kependudukan' ? 'selected' : '' }}>Data kependudukan</option>
                </select>
                <textarea class="sid-input min-h-36" name="uraian" placeholder="Uraikan pengaduan secara jelas">{{ old('uraian') }}</textarea>

                @if ($errors->any())
                    <div class="rounded-sid border border-red-300 bg-red-50 p-4 text-sm text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button class="sid-button w-fit" type="submit">Kirim pengaduan</button>
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
