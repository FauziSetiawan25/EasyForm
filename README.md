# EasyForm

**EasyForm** adalah aplikasi web berbasis Laravel yang memungkinkan pengguna untuk mendaftar melalui formulir online dan secara otomatis mendapatkan QR code sebagai bukti pendaftaran.

## 🚀 Fitur Utama

- Formulir pendaftaran pengguna yang mudah digunakan
- Pembuatan QR code otomatis setelah pendaftaran
- Validasi data pengguna
- Penyimpanan data pengguna di database
- Antarmuka pengguna responsif dengan Bootstrap
- Manajemen konfigurasi melalui file `.env`

## 🏗️ Teknologi yang Digunakan

- [Laravel 10](https://laravel.com/)
- [PHP 8.1+](https://www.php.net/)
- [MySQL](https://www.mysql.com/) atau [PostgreSQL](https://www.postgresql.org/)
- [Bootstrap 5](https://getbootstrap.com/)
- [Laravel QR Code](https://github.com/SimpleSoftwareIO/simple-qrcode)
- [Vite](https://vitejs.dev/)

## 📁 Struktur Proyek

```
EasyForm/
├── app/                # Logika aplikasi
├── bootstrap/          # File bootstrap Laravel
├── config/             # File konfigurasi
├── database/           # Migrasi dan seeder
├── public/             # Aset publik dan entri aplikasi
├── resources/          # View Blade dan aset frontend
├── routes/             # Definisi rute aplikasi
├── storage/            # File yang dihasilkan dan cache
├── tests/              # Pengujian aplikasi
├── .env.example        # Contoh file konfigurasi lingkungan
├── artisan             # CLI Laravel
├── composer.json       # Dependensi PHP
├── package.json        # Dependensi JavaScript
└── README.md           # Dokumentasi proyek
```

## ⚙️ Instalasi

1. **Kloning repositori:**

   ```bash
   git clone https://github.com/FauziSetiawan25/EasyForm.git
   cd EasyForm
   ```

2. **Instalasi dependensi PHP:**

   ```bash
   composer install
   ```

3. **Salin file `.env` dan konfigurasi:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Sesuaikan konfigurasi database dan lainnya di file `.env`.

4. **Migrasi database:**

   ```bash
   php artisan migrate
   ```

5. **Jalankan server pengembangan:**

   ```bash
   php artisan serve
   ```

   Akses aplikasi di `http://localhost:8000`.


## 📄 Lisensi

Proyek ini dilisensikan di bawah lisensi MIT.
