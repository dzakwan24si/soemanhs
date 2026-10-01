# PRD: Website SMA IT Soeman HS

Versi 1.0 | Status: Siap dieksekusi | Bahasa dokumen: Indonesia (identifier kode dalam bahasa Inggris)

---

## 0. Instruksi untuk Agent AI (BACA DULU)

Dokumen ini adalah satu-satunya sumber kebenaran untuk proyek. Patuhi aturan berikut:

1. Kerjakan **per milestone** (Bagian 17). Selesaikan dan verifikasi satu milestone sebelum lanjut ke berikutnya. Jangan membangun semuanya sekaligus.
2. Jangan mengarang konten sekolah (jumlah siswa, nama guru, akreditasi, nomor telepon, alamat, prestasi). Gunakan **placeholder yang jelas** (contoh: `[NAMA KEPALA SEKOLAH]`) dan buat seeder yang mudah diganti. Semua teks antarmuka publik memakai **Bahasa Indonesia**.
3. Gunakan stack yang ditetapkan di Bagian 4. Jika perlu menyimpang, jelaskan alasannya lebih dulu dan minta konfirmasi.
4. Jangan menambahkan fitur di luar cakupan (Bagian 3). Fitur Fase 2 hanya disiapkan strukturnya jika disebut eksplisit.
5. Setiap milestone harus lolos **kriteria penerimaan**-nya (Bagian 16) dan tidak meninggalkan error di `php artisan test`, `npm run build`, serta lint.
6. Tulis kode bersih dan konsisten: Laravel conventions, Form Request untuk validasi, Eloquent API Resources/DTO untuk data ke frontend, komponen React kecil dan dapat dipakai ulang, TypeScript untuk frontend.
7. Setelah tiap milestone, tulis ringkasan singkat: apa yang dibuat, cara menjalankan, dan hal yang masih perlu keputusan manusia.

---

## 1. Ringkasan Produk

**Nama proyek:** Website resmi SMA IT Soeman HS (Pekanbaru)
**Jenis:** Website sekolah (company profile institusi pendidikan) dengan panel admin untuk mengelola konten
**Klien:** SMA IT Soeman HS (di bawah Yayasan H. Soeman Hs.)
**Pengembang:** M. Dzakwan Syafiq

Website berfungsi sebagai wajah digital sekolah: memperkenalkan profil dan keunggulan sekolah, menyajikan berita dan pengumuman, mendukung promosi dan informasi PPDB, serta mudah dikelola oleh operator sekolah yang bukan teknisi.

## 2. Tujuan dan Metrik Keberhasilan

### Tujuan
- Membangun citra sekolah yang modern, kredibel, dan islami melalui desain yang menonjol.
- Memudahkan orang tua calon siswa menemukan informasi (profil, program, fasilitas, PPDB).
- Memberi sekolah kanal publikasi berita, pengumuman, agenda, dan galeri.
- Memberi operator sekolah panel admin yang sederhana.

### Metrik (target saat rilis)
| Metrik | Target |
|---|---|
| Lighthouse Performance (mobile) | >= 85 |
| Lighthouse SEO | >= 95 |
| Lighthouse Accessibility | >= 90 |
| LCP halaman beranda (4G) | <= 2.5 detik |
| Seluruh halaman publik responsif | 360px sampai 1440px |
| Operator dapat menerbitkan berita tanpa bantuan developer | Ya |

## 3. Cakupan

### Fase 1 (dikerjakan sekarang)
Seluruh halaman informasi publik, panel admin, SEO dasar, form kontak, halaman informasi PPDB (statis/CMS).

### Fase 2 (BUKAN bagian pekerjaan sekarang)
Form pendaftaran PPDB online beserta dashboard pendaftar dan pembayaran, pencarian lanjutan, versi dua bahasa, portal siswa/orang tua.

### Di luar cakupan
Sistem akademik (nilai, absensi, rapor), e-learning, pembayaran SPP.

## 4. Tech Stack

| Lapisan | Pilihan |
|---|---|
| Backend | Laravel (versi stabil terbaru), PHP 8.3+ |
| Frontend publik | React + TypeScript via **Inertia.js**, SSR diaktifkan bila hosting mendukung Node |
| Styling | Tailwind CSS |
| Animasi | Framer Motion (ringan, hanya untuk transisi penting) |
| Panel admin | **Filament** di `/admin` (terpisah dari frontend publik) |
| Database | MySQL 8 / MariaDB |
| Penyimpanan file | Laravel Storage (disk `public`), siap dipindah ke S3-compatible |
| Gambar | Konversi WebP dan ukuran responsif (Intervention Image atau Spatie Media Library) |
| Spam protection | Cloudflare Turnstile pada form kontak |
| Testing | Pest/PHPUnit (backend), Vitest atau minimal type-check (frontend) |
| Lint/format | Laravel Pint, ESLint, Prettier |

**Catatan hosting:** SSR Inertia membutuhkan proses Node. Jika hosting adalah shared hosting tanpa Node, matikan SSR dan pakai fallback: Blade layout (`app.blade.php`) tetap merender `<title>`, meta description, dan Open Graph dari data controller sehingga SEO dan pratinjau WhatsApp tetap berfungsi. Rancang kode agar kedua mode berjalan tanpa perubahan besar.

## 5. Persona Pengguna

1. **Orang tua calon siswa (utama):** mengakses lewat HP, mencari info program, biaya/PPDB, fasilitas, reputasi. Butuh kepercayaan dan kejelasan.
2. **Siswa dan alumni:** mencari berita, agenda, pengumuman, galeri, prestasi.
3. **Operator sekolah (admin):** mengunggah berita, pengumuman, foto. Non-teknis.
4. **Kepala sekolah/yayasan:** meninjau tampilan, memastikan citra sekolah.

## 6. Identitas Visual dan Design System

### 6.1 Karakter
Islami modern, bersih, hangat, tepercaya. Motif utama: **bintang segi delapan** (diambil dari logo sekolah). Banyak ruang kosong, foto asli berukuran besar, kartu bersudut membulat, animasi halus.

### 6.2 Warna (token CSS/Tailwind)
Nilai di bawah adalah estimasi dari logo. **Verifikasi dengan mengambil sampel warna dari file logo asli**, lalu sesuaikan.

| Token | Hex perkiraan | Penggunaan |
|---|---|---|
| `brand-900` | #064E50 | Hero, footer, teks heading gelap |
| `brand-700` | #0A6667 | Hover, elemen sekunder gelap |
| `brand-600` | #0E7C7B | Warna utama (tombol, link, ikon) |
| `brand-100` | #D5EEEC | Latar lembut, badge |
| `gold-500` | #D4A843 | Aksen, garis, bingkai, detail |
| `gold-100` | #F6EBCB | Latar aksen lembut |
| `accent-500` | #F28C28 | **Hanya CTA PPDB** dan elemen sangat penting |
| `cream-50` | #F7F5EF | Latar halaman |
| `ink-900` | #1F2A2A | Teks utama |
| `ink-500` | #5B6767 | Teks sekunder |
| `white` | #FFFFFF | Kartu, navbar |

Aturan: oranye dipakai hemat (maksimal 1-2 elemen per layar). Emas jangan dipakai untuk teks kecil di atas putih. Pastikan kontras teks minimal WCAG AA.

### 6.3 Tipografi
- Heading: **Plus Jakarta Sans** (600-700)
- Isi: **Inter** (400-500)
- Skala: h1 40-56px (desktop), 30-36px (mobile); isi 16-18px, line-height 1.6-1.7.

### 6.4 Komponen dasar
Button (primary teal, secondary outline emas, CTA oranye), Card (radius 16px, border tipis, bayangan sangat lembut), Badge kategori, Section heading (judul + garis emas pendek), SectionDivider bermotif bintang segi delapan, Breadcrumb, Pagination, Accordion (FAQ), Timeline (alur PPDB), Lightbox galeri, Skeleton loading.

### 6.5 Motif bintang segi delapan
Buat komponen `<StarPattern />` (SVG, ukuran dan opasitas dapat diatur) untuk: latar samar hero, pembatas antar-section, bingkai foto (opsional), dan ikon bagian. Buat versi SVG bintang dari bentuk dua persegi saling diputar 45 derajat sebagai pendekatan awal, ganti dengan SVG dari logo asli bila tersedia.

### 6.6 Animasi
Hanya `transform` dan `opacity`, durasi 200-500ms. Hormati `prefers-reduced-motion`. Contoh: fade-up saat section masuk viewport, hover kartu naik 2-4px, hero dengan parallax ringan (opsional).

### 6.7 Responsif
Mobile-first. Breakpoint Tailwind default. Navbar berubah menjadi menu hamburger di bawah `lg`. Tombol PPDB tetap terlihat di mobile.

## 7. Sitemap dan Rute Publik

| Rute | Halaman |
|---|---|
| `/` | Beranda |
| `/profil/tentang` | Tentang sekolah (sejarah, visi, misi) |
| `/profil/sambutan` | Sambutan kepala sekolah |
| `/profil/yayasan` | Profil yayasan |
| `/profil/struktur-organisasi` | Struktur organisasi |
| `/profil/guru-staf` | Guru dan staf |
| `/akademik/kurikulum` | Kurikulum |
| `/akademik/program-unggulan` | Program unggulan |
| `/akademik/ekstrakurikuler` | Daftar ekstrakurikuler |
| `/akademik/kalender` | Kalender akademik |
| `/kesiswaan/prestasi` | Prestasi |
| `/kesiswaan/osis` | OSIS |
| `/kesiswaan/alumni` | Alumni |
| `/fasilitas` | Daftar fasilitas |
| `/fasilitas/{slug}` | Detail fasilitas (opsional) |
| `/berita` | Daftar berita (filter kategori, pencarian, paginasi) |
| `/berita/{slug}` | Detail berita |
| `/pengumuman` | Daftar pengumuman |
| `/agenda` | Agenda kegiatan |
| `/galeri` | Daftar galeri |
| `/galeri/{id}` | Detail galeri |
| `/unduhan` | Dokumen unduhan |
| `/ppdb` | Informasi PPDB (alur, syarat, jadwal, FAQ) |
| `/kontak` | Kontak dan form pesan |
| `/sitemap.xml`, `/robots.txt` | SEO |
| `404` | Halaman tidak ditemukan bergaya brand |

Halaman statis (tentang, sambutan, yayasan, kurikulum, kalender, OSIS, alumni, ppdb) dikelola lewat tabel `pages` agar konten bisa diubah di admin.

## 8. Spesifikasi Halaman

### 8.1 Navbar (global)
Logo dan nama sekolah di kiri. Menu: Profil, Akademik, Kesiswaan, Fasilitas, Informasi (Berita, Pengumuman, Agenda, Galeri, Unduhan), Kontak. Tombol **PPDB** (oranye) di kanan. Sticky dengan latar putih saat scroll. Dropdown dapat diakses keyboard. Di mobile: drawer dari samping.

### 8.2 Footer (global)
Latar `brand-900`. Kolom: identitas sekolah dan alamat, tautan cepat, kontak (telepon, email, WhatsApp), media sosial (Instagram, Facebook, YouTube bila ada). Baris hak cipta. Data diambil dari `settings`.

### 8.3 Beranda
Urutan section:
1. **Hero:** foto sekolah besar (atau slider maksimal 3), tagline dua baris, kalimat pendukung, tombol "Daftar PPDB" (oranye) dan "Profil Sekolah" (outline emas), motif bintang samar.
2. **Statistik:** 4 angka (siswa, guru, alumni, prestasi) dari `settings`, animasi hitung saat terlihat.
3. **Sambutan kepala sekolah:** foto, kutipan singkat, tombol "Selengkapnya".
4. **Program unggulan:** 3-4 kartu (ikon, judul, deskripsi singkat) bergaris atas emas.
5. **Berita terbaru:** 3-4 artikel terbaru (thumbnail, kategori, judul, tanggal).
6. **Pengumuman dan agenda:** dua kolom, masing-masing 3-5 item terbaru.
7. **Fasilitas:** grid atau carousel foto dengan nama fasilitas.
8. **Prestasi:** 3-6 prestasi terbaru.
9. **Galeri:** cuplikan 6 foto/video dengan lightbox.
10. **Testimoni:** opsional, tampil hanya jika ada data.
11. **Banner CTA PPDB:** latar teal, bingkai emas, motif bintang, tombol oranye.
12. Footer.

Section tanpa data tidak boleh tampil kosong; sembunyikan section tersebut.

### 8.4 Berita (daftar)
Grid kartu, filter kategori (chip), kolom pencarian, paginasi (12 per halaman). Berita unggulan di atas (opsional). Hanya `status = published` dan `published_at <= now()`.

### 8.5 Berita (detail)
Judul, kategori, tanggal, penulis, gambar utama, isi (rich text), tombol bagikan (WhatsApp, Facebook, salin tautan), berita terkait (3 artikel sekategori). Tag meta SEO dan Open Graph lengkap. Breadcrumb.

### 8.6 Guru dan Staf
Grid kartu foto, nama, jabatan, mata pelajaran. Filter per kategori (Pimpinan, Guru, Tenaga Kependidikan). Urut berdasarkan `sort_order`.

### 8.7 Fasilitas
Kartu per fasilitas (foto, nama, deskripsi singkat). Opsional halaman detail dengan beberapa foto.

### 8.8 Ekstrakurikuler dan Prestasi
Ekstrakurikuler: kartu foto, nama, deskripsi, pembina. Prestasi: daftar kronologis, filter tahun dan tingkat (sekolah, kota, provinsi, nasional, internasional).

### 8.9 Pengumuman dan Agenda
Pengumuman: daftar dengan tanggal, sembunyikan yang sudah melewati `expires_at` dari beranda (tetap ada di arsip). Agenda: tampilan daftar per bulan dengan tanggal, lokasi, deskripsi singkat.

### 8.10 Galeri
Daftar album (sampul, judul, jumlah item). Detail album: grid masonry dengan lightbox. Video memakai embed YouTube (lazy load).

### 8.11 Unduhan
Daftar dokumen per kategori (nama, ukuran, tipe, tombol unduh). Hitung jumlah unduhan (opsional).

### 8.12 PPDB (informasi)
Dikelola dari `pages` dan `settings`: hero khusus, timeline alur pendaftaran, tabel jadwal, daftar syarat, FAQ accordion, tombol WhatsApp panitia, tombol unduh brosur. Struktur disiapkan agar form pendaftaran Fase 2 dapat ditambahkan tanpa mengubah rute.

### 8.13 Kontak
Alamat, jam operasional, telepon, email, Google Maps (embed iframe lazy), tautan media sosial, form pesan (nama, email, subjek, pesan) dengan validasi, Turnstile, dan rate limiting. Pesan tersimpan di `contact_messages` dan dapat diteruskan ke email sekolah.

## 9. Panel Admin (Filament di `/admin`)

Bahasa antarmuka admin: Indonesia. Setiap resource memiliki daftar, pencarian, filter, form dengan validasi, dan pratinjau gambar.

| Resource | Fitur |
|---|---|
| Berita (`posts`) | CRUD, rich text editor, unggah thumbnail, kategori, status draft/published, jadwal tayang, slug otomatis (dapat diedit), SEO meta (opsional) |
| Kategori (`categories`) | CRUD |
| Pengumuman (`announcements`) | CRUD, tanggal tayang dan kedaluwarsa |
| Agenda (`events`) | CRUD |
| Galeri (`galleries`, `gallery_items`) | CRUD album, unggah banyak foto sekaligus, tautan video YouTube, urutan |
| Guru dan staf (`staff`) | CRUD, unggah foto, kategori, urutan (drag and drop jika memungkinkan) |
| Ekstrakurikuler | CRUD, pilih pembina dari staf |
| Prestasi | CRUD, tahun, tingkat, relasi ekskul |
| Fasilitas | CRUD, urutan |
| Halaman statis (`pages`) | Edit konten rich text |
| Unduhan | CRUD, unggah file |
| Testimoni | CRUD (opsional) |
| Pesan masuk | Daftar, tandai dibaca, hapus |
| Pengaturan situs | Form tunggal: nama sekolah, tagline, alamat, telepon, email, WhatsApp, media sosial, teks hero, 4 angka statistik, embed peta, tahun ajaran aktif |
| Pengguna | CRUD, peran |

### Peran
- `admin`: akses penuh termasuk Pengguna dan Pengaturan.
- `operator`: konten (berita, pengumuman, agenda, galeri, unduhan, dll.), tidak bisa mengelola pengguna.

Login admin dilindungi rate limiting. Admin pertama dibuat lewat seeder (kata sandi dari `.env`, wajib diganti saat pertama login).

## 10. Model Data

Gunakan konvensi Laravel (`id`, `created_at`, `updated_at`). Foreign key dengan indeks. Soft delete (`deleted_at`) pada `posts`, `staff`, `announcements`.

### 10.1 Tabel inti
**users**: id, name, email (unique), password, role (`admin`|`operator`), remember_token, timestamps

**categories**: id, name, slug (unique), timestamps

**posts**: id, user_id (FK), category_id (FK), title, slug (unique), excerpt (text, nullable), content (longtext), thumbnail (nullable), status (`draft`|`published`), published_at (nullable), meta_title (nullable), meta_description (nullable), timestamps, softDeletes. Indeks: (status, published_at).

**announcements**: id, user_id (FK), title, content (text), published_at, expires_at (nullable), timestamps, softDeletes

**events**: id, title, description (text, nullable), location (nullable), start_at, end_at (nullable), timestamps. Indeks: start_at.

**galleries**: id, event_id (FK nullable), title, cover (nullable), timestamps

**gallery_items**: id, gallery_id (FK, cascade), type (`image`|`video`), file_path (nullable), video_url (nullable), caption (nullable), sort_order, timestamps

**staff**: id, name, position, subject (nullable), category (`pimpinan`|`guru`|`tenaga_kependidikan`), photo (nullable), sort_order, timestamps, softDeletes

**extracurriculars**: id, coach_id (FK staff nullable), name, slug, description (text, nullable), photo (nullable), timestamps

**achievements**: id, extracurricular_id (FK nullable), title, level (`sekolah`|`kota`|`provinsi`|`nasional`|`internasional`), winner_name (nullable), year, photo (nullable), timestamps

### 10.2 Tabel pendukung
**pages**: id, title, slug (unique), content (longtext), meta_description (nullable), timestamps

**facilities**: id, name, slug (unique), description (text, nullable), photo (nullable), sort_order, timestamps

**downloads**: id, title, category (nullable), file_path, download_count (default 0), timestamps

**contact_messages**: id, name, email, subject, message (text), is_read (default false), ip_address (nullable), timestamps

**settings**: id, key (unique), value (text, nullable), timestamps. Sediakan helper `setting('key', default)` dengan cache.

**testimonials** (opsional): id, name, role, content (text), photo (nullable), is_active, timestamps

### 10.3 Seeder
Buat seeder yang mengisi: admin awal, kategori contoh (Berita Sekolah, Prestasi, Kegiatan, Pengumuman Umum), `settings` dengan placeholder, halaman statis dengan teks placeholder, beberapa data contoh berita/guru/fasilitas **yang jelas bertanda contoh** agar tampilan dapat diuji. Semua seeder contoh harus mudah dihapus.

## 11. Kebutuhan Non-Fungsional

### 11.1 SEO
- `<title>` dan meta description unik per halaman.
- Open Graph dan Twitter Card (gambar 1200x630) agar pratinjau WhatsApp rapi.
- `sitemap.xml` dinamis, `robots.txt`.
- Data terstruktur JSON-LD: `EducationalOrganization` (beranda), `NewsArticle` (berita), `BreadcrumbList`.
- URL bersih berbasis slug, canonical URL.
- Favicon dan ikon touch dari logo.

### 11.2 Performa
- Gambar: WebP, ukuran responsif (`srcset`), `loading="lazy"` kecuali gambar hero, atribut width/height untuk mencegah layout shift.
- Code splitting per halaman, hindari library berat.
- Cache query beranda dan `settings` (cache 5-10 menit, bersihkan saat data berubah).
- Eager loading untuk mencegah N+1.
- Font dimuat dengan `font-display: swap` dan subset Latin.

### 11.3 Keamanan
- Validasi lewat Form Request di setiap input.
- Proteksi CSRF, XSS (sanitasi output rich text, misalnya dengan HTMLPurifier), SQL injection (Eloquent/query builder).
- Rate limiting: form kontak, login admin.
- Cloudflare Turnstile pada form kontak.
- Batasi tipe dan ukuran upload (gambar maks 4 MB, dokumen maks 10 MB), validasi MIME, nama file di-randomisasi.
- `APP_DEBUG=false` di produksi, header keamanan dasar (HSTS, X-Content-Type-Options, Referrer-Policy).
- Rahasia hanya di `.env`, jangan commit.

### 11.4 Aksesibilitas
Semantic HTML, alt text pada gambar bermakna, fokus keyboard terlihat, label pada form, kontras warna AA, `aria-*` pada navigasi dropdown dan lightbox.

### 11.5 Kompatibilitas
Dua versi terbaru Chrome, Safari, Firefox, Edge; Android dan iOS modern.

### 11.6 Backup dan pemeliharaan
Sediakan dokumentasi backup database dan folder `storage`. Jadwalkan `php artisan schedule:run` jika ada tugas terjadwal (pembersihan cache, publikasi terjadwal).

## 12. Struktur Proyek yang Disarankan

```
app/
  Http/Controllers/Public/   # HomeController, PostController, dll.
  Http/Requests/             # ContactMessageRequest, dll.
  Models/
  Filament/Resources/        # resource admin
  Support/                   # helper setting(), SEO
database/
  migrations/
  seeders/
resources/
  js/
    Components/              # UI reusable (Button, Card, StarPattern, ...)
    Layouts/                 # PublicLayout
    Pages/                   # Home, Posts/Index, Posts/Show, ...
    lib/
  css/app.css                # token Tailwind
routes/
  web.php
tests/
```

## 13. Konten yang Harus Disiapkan Pihak Sekolah

Agent tidak boleh mengarang ini. Gunakan placeholder sampai tersedia.
- Logo resolusi tinggi (SVG/PNG transparan)
- Foto asli: gedung, kelas, laboratorium, masjid/musala, kegiatan, kepala sekolah, guru
- Teks: sejarah, visi dan misi, sambutan kepala sekolah, deskripsi program unggulan, kurikulum
- Data guru dan staf (nama, jabatan, mapel, foto)
- Data fasilitas, ekstrakurikuler, prestasi
- Informasi PPDB (alur, syarat, jadwal, kontak panitia, brosur)
- Kontak resmi: alamat, telepon, email, WhatsApp, akun media sosial (verifikasi dari materi resmi sekolah)
- Embed Google Maps lokasi sekolah

## 14. Asumsi dan Pertanyaan Terbuka

| # | Hal | Asumsi sementara |
|---|---|---|
| 1 | Jenis hosting (shared, VPS, cloud) | Belum diketahui; kode mendukung SSR on/off |
| 2 | Domain | Disediakan sekolah atau developer, belum ditetapkan |
| 3 | Warna persis logo | Perkiraan di Bagian 6.2, harus diverifikasi |
| 4 | Program unggulan yang ditonjolkan | Placeholder, menunggu data sekolah |
| 5 | Perlu mode gelap | Tidak (Fase 1) |
| 6 | Kirim email dari form kontak | Simpan di database; email opsional bila SMTP tersedia |
| 7 | Pengelola konten harian | Operator sekolah (sedang direkrut) |

## 15. Risiko

| Risiko | Dampak | Mitigasi |
|---|---|---|
| Foto berkualitas rendah | Kesan kurang premium | Minta sesi foto/dokumentasi baru; desain tahan terhadap foto biasa |
| Hosting tanpa Node | SSR tidak tersedia | Fallback meta tag server-side (Bagian 4) |
| Konten terlambat | Rilis mundur | Placeholder + seeder, rilis bertahap |
| Permintaan fitur tambahan | Lingkup melebar | Patuhi Bagian 3, tambahan masuk Fase 2 |
| Operator kesulitan memakai admin | Situs jarang diperbarui | Admin sederhana, panduan singkat/video serah terima |

## 16. Kriteria Penerimaan

### Umum
- [ ] Semua rute di Bagian 7 dapat diakses tanpa error.
- [ ] Tampil benar di 360px, 768px, 1280px, 1440px.
- [ ] Tidak ada error di console pada halaman utama.
- [ ] `php artisan test`, `npm run build`, dan lint lolos.
- [ ] Lighthouse mobile memenuhi target Bagian 2 pada beranda dan detail berita.

### Fungsional
- [ ] Operator dapat membuat, mengedit, menjadwalkan, dan menghapus berita; berita draft tidak tampil di publik.
- [ ] Berita terbit otomatis saat `published_at` tercapai.
- [ ] Filter kategori, pencarian, dan paginasi berita berfungsi.
- [ ] Unggah banyak foto ke galeri berfungsi; lightbox berfungsi.
- [ ] Form kontak tervalidasi, terlindungi Turnstile dan rate limit, pesan muncul di admin.
- [ ] Perubahan di Pengaturan Situs langsung tampil di footer, kontak, dan beranda.
- [ ] Peran `operator` tidak dapat membuka menu Pengguna dan Pengaturan.
- [ ] Section beranda tanpa data otomatis tersembunyi.

### SEO
- [ ] Meta title/description unik, OG tag benar (uji dengan pratinjau tautan).
- [ ] `sitemap.xml` memuat berita dan halaman publik.
- [ ] JSON-LD valid.

### Desain
- [ ] Token warna dan tipografi dipakai konsisten (tanpa warna hardcode acak).
- [ ] Motif bintang segi delapan muncul di hero, pembatas section, dan banner PPDB.
- [ ] Oranye hanya dipakai untuk CTA PPDB.

## 17. Milestone dan Rincian Tugas

### M1: Fondasi proyek
- Inisialisasi Laravel, Inertia + React + TypeScript, Tailwind, Vite.
- Konfigurasi token desain (warna, font) dan komponen dasar (Button, Card, Badge, SectionHeading, StarPattern).
- `PublicLayout` dengan Navbar dan Footer (data dari `settings`).
- Setup lint, format, testing, `.env.example`.
- **Selesai bila:** layout kosong tampil di mobile dan desktop, build lolos.

### M2: Database dan admin
- Semua migration dan model beserta relasi (Bagian 10).
- Helper `setting()`.
- Filament terpasang, resource untuk semua entitas, peran admin/operator.
- Seeder (Bagian 10.3).
- **Selesai bila:** operator dapat mengelola semua konten dari `/admin`.

### M3: Halaman utama dan informasi
- Beranda lengkap (Bagian 8.3).
- Halaman statis (`pages`): tentang, sambutan, yayasan, struktur, kurikulum, kalender, OSIS, alumni.
- Guru dan staf, fasilitas, ekstrakurikuler, prestasi, program unggulan.
- **Selesai bila:** semua halaman ini tampil dengan data seeder dan responsif.

### M4: Informasi dinamis
- Berita (daftar, detail, filter, pencarian, terkait), pengumuman, agenda, galeri + lightbox, unduhan.
- Publikasi terjadwal.
- **Selesai bila:** alur operator buat berita sampai tayang berjalan end-to-end.

### M5: PPDB dan kontak
- Halaman informasi PPDB (timeline, jadwal, syarat, FAQ).
- Halaman kontak dengan peta, form, Turnstile, rate limit.
- **Selesai bila:** pesan kontak tersimpan dan terlihat di admin.

### M6: SEO, performa, keamanan
- Meta, OG, JSON-LD, sitemap, robots, favicon.
- Optimasi gambar, caching, eager loading, audit Lighthouse.
- Sanitasi rich text, header keamanan, audit upload.
- **Selesai bila:** semua kriteria SEO dan performa di Bagian 16 terpenuhi.

### M7: Polesan dan serah terima
- Animasi halus, state kosong dan error, halaman 404.
- Pengujian lintas perangkat dan aksesibilitas.
- Dokumentasi: README (setup, deploy), panduan singkat admin untuk operator, daftar konten yang masih placeholder.
- **Selesai bila:** checklist Bagian 16 seluruhnya tercentang.

## 18. Deployment (ringkas)

1. Siapkan server (PHP 8.3+, MySQL, Composer, Node bila SSR).
2. Set `.env` produksi (`APP_ENV=production`, `APP_DEBUG=false`, database, mail, Turnstile key).
3. `composer install --no-dev --optimize-autoloader`, `npm ci && npm run build`.
4. `php artisan migrate --force`, `php artisan storage:link`, `php artisan config:cache route:cache view:cache`.
5. Jalankan seeder admin, ganti kata sandi awal.
6. Aktifkan HTTPS, atur scheduler (cron) dan backup berkala.

---

*Akhir dokumen. Jika ada hal yang ambigu, agent harus bertanya sebelum membuat asumsi besar, dan mencatat setiap asumsi di README.*
