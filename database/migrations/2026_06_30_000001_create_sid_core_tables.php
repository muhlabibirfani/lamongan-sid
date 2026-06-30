<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });

        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->string('jenis')->default('Desa');
            $table->string('status')->default('Aktif');
            $table->unsignedInteger('jumlah_penduduk')->default(0);
            $table->unsignedInteger('jumlah_kk')->default(0);
            $table->timestamps();
        });

        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->string('nomor_kk_hash')->index();
            $table->string('kepala_keluarga');
            $table->string('alamat');
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });

        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->foreignId('kartu_keluarga_id')->nullable()->constrained('kartu_keluarga')->nullOnDelete();
            $table->string('nama');
            $table->string('jenis_kelamin', 20);
            $table->date('tanggal_lahir')->nullable();
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });

        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->string('nomor')->unique();
            $table->string('jenis');
            $table->string('pemohon');
            $table->string('status')->default('Diajukan');
            $table->date('tanggal_pengajuan');
            $table->timestamps();
        });

        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->string('nomor_tiket')->unique();
            $table->string('nama_pelapor');
            $table->string('kontak');
            $table->string('kategori');
            $table->text('uraian');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan');
            $table->longText('konten');
            $table->string('kategori')->default('Berita');
            $table->string('status')->default('Terbit');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('produk_umkm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->nullable()->constrained('desas')->nullOnDelete();
            $table->string('nama');
            $table->string('pelaku_usaha');
            $table->unsignedBigInteger('harga');
            $table->string('status')->default('Tersedia');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('anggaran_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->cascadeOnDelete();
            $table->year('tahun');
            $table->string('kategori');
            $table->string('uraian');
            $table->unsignedBigInteger('nilai');
            $table->unsignedTinyInteger('realisasi')->default(0);
            $table->string('status')->default('Berjalan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggaran_desa');
        Schema::dropIfExists('produk_umkm');
        Schema::dropIfExists('artikels');
        Schema::dropIfExists('pengaduans');
        Schema::dropIfExists('surats');
        Schema::dropIfExists('penduduks');
        Schema::dropIfExists('kartu_keluarga');
        Schema::dropIfExists('desas');
        Schema::dropIfExists('kecamatans');
    }
};
