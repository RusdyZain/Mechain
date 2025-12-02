# Mechain: Solusi Terbaik Mencari Bengkel dan Informasi Perawatan Mandiri

**Mechain** adalah sebuah platform inovatif berbasis web yang membantu para pemilik motor di Mataram menemukan bengkel motor terdekat dan memperoleh panduan perawatan motor secara mandiri. Proyek ini dirancang untuk memberikan kemudahan akses layanan bengkel dan pengetahuan praktis tentang cara merawat motor secara efisien.

Kode sumber aplikasi web ini berada di dalam folder `mechain/` dan terdiri dari kombinasi file **HTML, CSS, JavaScript, PHP**, serta sebuah skema database **PostgreSQL**.

## Fitur Utama

1. **Pencarian Bengkel Terdekat**  
   Fitur ini memungkinkan pengguna menemukan bengkel motor terdekat di wilayah **Mataram** melalui peta interaktif. Dengan Mechain, pengguna dapat melihat lokasi bengkel secara real-time dan menemukan yang terdekat sesuai dengan posisi mereka.

2. **Informasi Waktu Operasional dan Layanan Bengkel**  
   Mechain menyediakan informasi lengkap mengenai jam operasional dan jenis layanan yang ditawarkan oleh setiap bengkel. Pengguna dapat dengan mudah memeriksa kapan bengkel buka dan layanan apa yang tersedia, mulai dari servis ringan hingga perbaikan besar.

3. **Panduan Perawatan Motor Mandiri**  
   Selain informasi bengkel, Mechain juga menyediakan **panduan lengkap** tentang perawatan motor mandiri. Panduan ini mencakup:
   - **Perawatan Rutin**: Tips harian dan bulanan untuk memastikan performa motor tetap optimal.
   - **Perbaikan Ringan**: Langkah-langkah perbaikan sederhana yang dapat dilakukan sendiri di rumah.
   - **Tindakan Pencegahan**: Cara menjaga mesin dan komponen motor agar lebih awet dan tidak cepat rusak.

4. **Koneksi Mudah ke Bengkel**  
   Mechain mempermudah pengguna untuk langsung menghubungi bengkel melalui informasi kontak yang disediakan. Dengan fitur ini, pengguna dapat:
   - Mengatur janji temu untuk perawatan motor.
   - Meminta estimasi biaya sebelum perbaikan.
   - Mengajukan pertanyaan terkait layanan yang tersedia.

## Teknologi yang Digunakan

- **HTML5, CSS3, dan JavaScript**: Untuk membangun antarmuka yang interaktif dan dinamis.
- **Bootstrap**: Digunakan untuk desain responsif, memastikan website dapat diakses di berbagai perangkat.
- **Google Maps Embed / API Map**: Untuk menampilkan lokasi bengkel motor terdekat secara akurat dan real-time pada halaman utama.
- **PHP**: Digunakan untuk fitur login, manajemen artikel, data bengkel, dan panel pengguna (admin, bengkel, user).
- **PostgreSQL**: Menyimpan informasi bengkel, layanan, pengguna, dan panduan perawatan motor. Skema database tersedia pada file `mechain/db/mechain_db.sql`.

## Struktur Proyek

Struktur folder utama di dalam repositori ini:

- `mechain/index.php` – Halaman landing utama Mechain.
- `mechain/css/` – Berisi stylesheet (Bootstrap, animasi, dan styling kustom).
- `mechain/js/` – Berisi file JavaScript pendukung.
- `mechain/img/`, `mechain/foto/`, `mechain/fonts/` – Berisi aset gambar dan font.
- `mechain/php/` – Berisi script PHP untuk login, CRUD artikel, bengkel, user, dan fitur-fitur lainnya.
- `mechain/db/mechain_db.sql` – File SQL untuk membuat database Mechain di PostgreSQL.

## Cara Memulai (Mode Pengembangan Lokal)

Ikuti langkah-langkah berikut untuk menjalankan proyek Mechain di lingkungan lokal Anda:

1. **Clone repositori ini**:
   ```bash
   git clone https://github.com/RusdyZain/Mechain.git
   ```

2. **Buka direktori proyek**:
   ```bash
   cd Mechain
   ```

3. **Jalankan server pengembangan**:  
   - Cara tercepat adalah memakai built-in server PHP langsung dari folder `mechain`:
     ```bash
     cd mechain
     php -S localhost:8000
     ```
   - Jika ingin menggunakan Apache/Nginx (misalnya lewat XAMPP/Laragon), pastikan `DocumentRoot` mengarah ke folder `mechain/` atau set variabel `APP_BASE_PATH=/mechain` di file `.env`.

4. **Siapkan konfigurasi environment (.env)**:
   - Masuk ke folder `mechain` dan salin file contoh:
     ```bash
     cd mechain
     cp .env.example .env
     ```
   - Edit file `.env` dan isi nilai berikut:
     - `APP_BASE_PATH` → kosongkan jika aplikasi berjalan di root host (`http://localhost:8000`). Isi `/mechain` jika aplikasi berada di subfolder (`http://localhost/mechain`).
     - `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD` → kredensial PostgreSQL lokal Anda.

5. **Import database**:
   - Gunakan client PostgreSQL (misalnya `psql` atau GUI seperti pgAdmin).
   - Buat database baru, misalnya dengan nama `mechain_db`.
   - Import struktur/data dari file `mechain/db/mechain_db.sql` (sesuaikan sintaks jika sebelumnya dibuat untuk MySQL).

6. **Sesuaikan konfigurasi koneksi database jika diperlukan**:  
   - Buka file `mechain/php/conn_db/db_conn.php`.  
   - Pastikan koneksi berhasil ke database PostgreSQL yang sudah Anda buat.

7. **Jalankan website di browser**:  
   - Jika memakai built-in server PHP, buka `http://localhost:8000/index.php`.  
   - Jika memakai Apache/Nginx dengan subfolder, akses sesuai `APP_BASE_PATH` yang Anda tentukan (mis. `http://localhost/mechain/index.php`).  
   - Fitur login, artikel, dan manajemen bengkel dapat diakses melalui menu yang tersedia di halaman utama.

## Kontribusi

Kami menyambut semua pengembang yang tertarik untuk berkontribusi dalam proyek Mechain. Jika Anda memiliki ide untuk meningkatkan pengalaman pengguna, menambahkan fitur baru, atau menyempurnakan fungsionalitas website, berikut adalah langkah-langkah untuk berkontribusi:

1. **Fork repositori ini**.
2. Buat branch fitur baru (`git checkout -b fitur-baru`).
3. Lakukan commit atas perubahan yang Anda buat (`git commit -m 'Menambahkan fitur baru'`).
4. Push branch ke repositori (`git push origin fitur-baru`).
5. Buat pull request dan tim kami akan mereview kontribusi Anda.

## Pengembangan Lebih Lanjut

Beberapa ide untuk pengembangan Mechain di masa mendatang meliputi:
- **Integrasi API Cuaca**: Menyediakan informasi cuaca terkini agar pengguna dapat merencanakan perawatan motor di saat yang tepat.
- **Penambahan Fitur Review Bengkel**: Pengguna dapat memberikan review dan rating untuk bengkel-bengkel yang mereka kunjungi.
- **Sistem Notifikasi**: Memberikan pengingat kepada pengguna untuk melakukan perawatan rutin pada motor mereka.
