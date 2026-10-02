# SMA IT Soeman HS Web

Website resmi publik untuk SMA IT Soeman HS Pekanbaru.

## Tech Stack
- **Backend:** Laravel 13
- **Frontend:** React 19 + Inertia.js
- **Styling:** Tailwind CSS + UI Custom
- **Icons:** Heroicons

## Cara Setup
1. Pastikan Anda telah menginstal PHP, Composer, Node.js, dan MySQL (Laragon/XAMPP).
2. Install dependensi PHP:
   ```bash
   composer install
   ```
3. Install dependensi NPM:
   ```bash
   npm install
   ```
4. Salin file `.env.example` menjadi `.env` (jika belum ada) dan konfigurasi koneksi database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Buat database sesuai nama di `.env` dan jalankan migrasi:
   ```bash
   php artisan migrate
   ```

## Cara Menjalankan
Jalankan kedua perintah berikut di terminal terpisah:
1. Menjalankan backend Laravel:
   ```bash
   php artisan serve --port=8001
   ```
2. Menjalankan frontend Vite:
   ```bash
   npm run dev
   ```

## Cara Testing
Proyek ini menggunakan Pest untuk pengujian otomatis.
Untuk menjalankan seluruh *test suite*, jalankan:
```bash
php artisan test
```

## Catatan Khusus
- **Data Hari Besar Islam**: Pada komponen Kalender Akademik di beranda, data hari besar agama (misal: Maulid Nabi, Tasmi', dll) akan diinput secara manual oleh admin melalui *database*. Sistem tidak menghitung dan memprediksi tanggal hijriah secara otomatis untuk hari raya karena penentuan tanggal aktual bergantung pada keputusan otoritas.

## Admin & Credentials
Wajib mengubah kredensial default sebelum *deploy* ke produksi. Sesuaikan nilai berikut pada file `.env`:
```env
ADMIN_EMAIL=admin@soemanhs.sch.id
ADMIN_PASSWORD=GANTI-INI-SEBELUM-DEPLOY
OPERATOR_EMAIL=operator@soemanhs.sch.id
OPERATOR_PASSWORD=GANTI-INI-SEBELUM-DEPLOY
```

Data utama (kategori, admin, halaman placeholder) menggunakan `DatabaseSeeder`. Untuk mengisi data dummy (berita, fasilitas, prestasi untuk keperluan contoh), jalankan:
```bash
php artisan db:seed --class=DemoSeeder
```
