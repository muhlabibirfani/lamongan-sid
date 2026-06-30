# Prompt: Web SID Kabupaten Lamongan — struktur seperti OpenSID, warna dari ikan logo

> Khusus untuk **Kabupaten Lamongan** — mencakup seluruh 18 kecamatan
> dan 400+ desa/kelurahan di bawah koordinasi Pemerintah Kabupaten
> Lamongan.

```
Act as a senior product designer and frontend engineer who specializes in
government digital services (e-government) for Indonesian local
administrations. You have shipped production-grade citizen-facing portals
that meet WCAG AA accessibility, are mobile-responsive, and follow the
visual rigor of services like e-Kelurahan, Lapor!, or other respected
Indonesian gov-tech platforms — not a generic template or a hackathon-
quality mockup. Every decision (spacing, type scale, color contrast,
empty states, loading states, error states) should reflect that level
of polish, because this will be used by an actual Kabupaten government
and the public will judge its credibility based on the website's design.

TECH STACK:
- Backend: Laravel (versi terbaru/LTS terkini), bukan PHP native seperti
  OpenSID asli (yang berbasis CodeIgniter) — gunakan struktur OpenSID
  hanya sebagai acuan modul/fitur, bukan acuan kode
- Frontend: Blade templating + Tailwind CSS untuk styling (definisikan
  warna palet ikan sebagai custom theme di tailwind.config.js, bukan
  hardcode hex di tiap file)
- Gunakan Laravel Breeze atau Jetstream untuk autentikasi & role-based
  access (operator desa / petugas kecamatan / admin kabupaten)
- Gunakan Eloquent ORM dengan migration terstruktur untuk: desa,
  kecamatan, penduduk, kartu_keluarga, surat, pengaduan, artikel,
  produk_umkm, anggaran_desa
- Gunakan Laravel Policy/Gate untuk membedakan akses halaman publik
  (tanpa login) dan halaman admin (login wajib)
- Gunakan Laravel Livewire atau Alpine.js untuk komponen interaktif
  (filter tabel, status tracker pengaduan, galeri foto) tanpa perlu
  build SPA penuh
- Struktur folder mengikuti konvensi Laravel standar (app/Models,
  app/Http/Controllers, resources/views), dipisah per modul:
  app/Http/Controllers/Admin/ dan app/Http/Controllers/Public/
- Sertakan seeder untuk data dummy 400 desa dan 18 kecamatan agar bisa
  langsung diuji tanpa input manual

Buatkan saya desain/implementasi web Sistem Informasi Desa (SID) yang
strukturnya mengikuti OpenSID (https://github.com/OpenSID/OpenSID) —
modul, tata letak, dan fungsinya sama seperti SID pada umumnya — tapi
seluruh skema warnanya diganti total memakai palet dari ilustrasi ikan
pada logo "Lamongan Megilan" (bukan warna hijau/merah default OpenSID).

PALET WARNA (dari ikan logo, bukan dari teks logo):
- Primary — biru tubuh ikan besar: #0B9FD4
- Secondary — biru terang ujung sirip: #29C4E0
- Tertiary — biru muda perut ikan: #7DDCE8
- Success/aktif — teal ikan kecil: #3DB88A
- Transisi — teal antar ikan: #55C4A8
- Aksen mikro — hijau muda sirip bawah: #A8D96A (hanya badge/tag kecil,
  jangan dipakai untuk teks)
- Background canvas: #E8F9FC
- Border halus: #C8EEF5
- Card: putih #FFFFFF
- Teks body: #5B5B5B (netral)

STRUKTUR WEB (mengikuti modul nyata OpenSID):

1. HALAMAN PUBLIK (tanpa login)
   - Beranda: hero banner, profil singkat desa/kabupaten, berita terbaru
   - Web Artikel: daftar berita & pengumuman, bisa difilter per kecamatan/desa
   - Web Lapak: marketplace produk UMKM, grid produk dengan foto, harga,
     dan asal desa
   - Web Peta: peta interaktif wilayah, klik desa untuk lihat info singkat
   - Web Pembangunan: transparansi APBDes, progress proyek pembangunan
     per desa, grafik anggaran
   - Web Statistik: ringkasan data agregat kabupaten (penduduk, KK, dll)
   - Web Pengaduan: form keluhan warga + tracking status by nomor tiket
   - Layanan Mandiri Warga: ajukan surat keterangan tanpa ke kantor desa,
     status real-time

2. HALAMAN ADMIN (login, role-based: operator desa / petugas kecamatan /
   admin kabupaten)
   - Dashboard: stat card (total desa, total penduduk, surat diproses,
     desa aktif), chart distribusi per kecamatan
   - Data Desa: tabel 400 desa dengan filter, pagination
   - Kependudukan: data KK, mutasi penduduk, deteksi data ganda/invalid
   - Administrasi Surat: surat masuk/keluar, tanda tangan elektronik
     kepala desa, mode anjungan mandiri (kiosk, touch-friendly)
   - Statistik & Analisis: termasuk rekapitulasi stunting per kecamatan

KETENTUAN VISUAL:
- Sidebar admin (240px) pakai background/aksen #0B9FD4 untuk item aktif
- Tombol utama: fill #0B9FD4, teks putih, border-radius 8px, flat (tanpa
  gradien)
- Badge status "Aktif"/"Selesai": #3DB88A; status "Tidak Aktif"/"Pending":
  abu-abu netral
- Card: putih, border 1px #C8EEF5, border-radius 12px, tanpa box-shadow
  berat
- Chart pakai kombinasi #0B9FD4 dan #29C4E0, jangan campur dengan #3DB88A
  dalam chart yang sama kecuali memang merepresentasikan kategori berbeda
- Font: Inter atau Plus Jakarta Sans, sentence case di semua label
- Ikon outline style, konsisten 20px

DO:
- Pertahankan struktur navigasi dan fungsi modul seperti OpenSID asli —
  jangan kurangi fitur, hanya ganti warnanya
- Pastikan halaman publik (Artikel, Lapak, Pengaduan, Pembangunan,
  Layanan Mandiri) bisa diakses TANPA login
- Pakai #0B9FD4 secara konsisten di semua elemen aksi utama (tombol,
  link, nav aktif) di seluruh halaman, publik maupun admin
- Sediakan area khusus di Beranda untuk menampilkan foto/dokumentasi
  resmi dari Dinas (galeri foto kegiatan, akan saya tambahkan sendiri
  nanti) — buatkan slot/komponen galeri yang siap diisi
- Gunakan foto dengan rasio dan crop yang konsisten di galeri, supaya
  rapi meskipun sumber fotonya nanti bervariasi ukurannya
- Sediakan placeholder/empty state yang jelas untuk galeri foto sebelum
  foto asli dimasukkan (jangan dibiarkan kosong tanpa keterangan)
- Tambahkan breadcrumb di setiap halaman dalam, supaya navigasi terasa
  rapi dan tidak membingungkan pengunjung
- Sertakan footer resmi: alamat kantor, jam pelayanan, kontak darurat,
  tautan media sosial resmi, dan logo Pemkab/Dinas terkait
- Tambahkan loading state (skeleton screen) dan empty state yang jelas
  untuk setiap tabel/list data, bukan halaman blank saat data kosong
- Sertakan halaman error 404/500 yang didesain khusus, bukan bawaan
  server, agar tetap terasa konsisten dengan brand
- Gunakan microcopy yang sopan dan baku (Bahasa Indonesia formal,
  bukan bahasa gaul) di semua label, tombol, dan pesan notifikasi
- Pastikan semua form punya validasi input yang jelas dan pesan error
  yang membantu, bukan sekadar "input tidak valid"
- Gunakan Laravel Form Request untuk validasi, jangan validasi inline
  di controller agar kode tetap rapi dan mudah diuji
- Pakai Laravel Resource Controller (index, create, store, show, edit,
  update, destroy) yang konsisten untuk tiap modul CRUD
- Definisikan warna palet ikan di tailwind.config.js sebagai custom
  color (misal: lamongan.primary, lamongan.success), bukan ditulis
  manual hex di class Tailwind setiap kali

DON'T:
- Jangan gunakan warna di luar palet ikan (tidak ada merah, oranye,
  ungu, kuning) di elemen UI mana pun
- Jangan pakai gradien di tombol, card, atau background manapun
- Jangan pakai #A8D96A sebagai warna teks — kontrasnya kurang
- Jangan pakai dark mode — ini harus tetap terang dan formal khas
  website pemerintahan
- Jangan tampilkan NIK/KK warga atau data pribadi apa pun di halaman
  publik
- Jangan buat galeri foto dengan crop otomatis yang memotong wajah/objek
  penting — gunakan object-fit: contain atau cropping yang aman
- Jangan taruh galeri foto dari Dinas di belakang login — ini konten
  publik untuk transparansi, harus bisa dilihat semua orang
- Jangan pakai watermark/logo tambahan di atas foto resmi Dinas kecuali
  diminta khusus
- Jangan pakai bahasa informal/gaul, emoji berlebihan, atau placeholder
  teks "Lorem ipsum" yang terlihat belum jadi — semua copy harus terasa
  final dan layak tayang
- Jangan biarkan ada elemen yang terlihat "setengah jadi" seperti tombol
  tanpa fungsi, link mati, atau ikon generic yang tidak konsisten gaya
- Jangan tulis query database langsung di file Blade — semua logic data
  harus lewat Controller/Model, Blade hanya untuk presentasi
- Jangan hardcode hex warna di banyak file Blade — selalu rujuk ke
  custom color Tailwind yang sudah didefinisikan terpusat
- Jangan satukan logic admin dan publik dalam satu Controller yang sama
  — pisahkan namespace Admin/ dan Public/ agar middleware otentikasi
  jelas dan tidak ada halaman admin yang bocor ke publik

CATATAN: Foto-foto resmi dari Dinas akan saya tambahkan kemudian —
tolong siapkan dulu strukturnya (misalnya komponen galeri di Beranda
atau halaman "Profil/Galeri Kegiatan") sehingga saat fotonya saya
kirim, saya bisa langsung minta dipasang tanpa perlu desain ulang.
```
