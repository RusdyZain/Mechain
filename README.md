# Mechain: Solusi Terbaik Mencari Bengkel dan Informasi Perawatan Mandiri

**Mechain** adalah sebuah platform inovatif berbasis web yang membantu para pemilik motor di Mataram menemukan bengkel motor terdekat dan memperoleh panduan perawatan motor secara mandiri. Proyek ini dirancang untuk memberikan kemudahan akses layanan bengkel dan pengetahuan praktis tentang cara merawat motor secara efisien.

Kode sumber aplikasi web ini berada di dalam folder `mechain/` dan terdiri dari kombinasi file **HTML, CSS, JavaScript, PHP**, serta sebuah skema database **MySQL**.

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
- **MySQL**: Menyimpan informasi bengkel, layanan, pengguna, dan panduan perawatan motor. Skema database tersedia pada file `mechain/db/mechain_db.sql`.

## Struktur Proyek

Struktur folder utama di dalam repositori ini:

- `mechain/index.html` – Halaman landing utama Mechain.
- `mechain/css/` – Berisi stylesheet (Bootstrap, animasi, dan styling kustom).
- `mechain/js/` – Berisi file JavaScript pendukung.
- `mechain/img/`, `mechain/foto/`, `mechain/fonts/` – Berisi aset gambar dan font.
- `mechain/php/` – Berisi script PHP untuk login, CRUD artikel, bengkel, user, dan fitur-fitur lainnya.
- `mechain/db/mechain_db.sql` – File SQL untuk membuat database Mechain di MySQL.

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

3. **Siapkan server web lokal (WAMP/XAMPP/Laragon)**:  
   - Pastikan modul **Apache** dan **MySQL** aktif.  
   - Salin folder `mechain/` ke dalam folder web server Anda, misalnya `htdocs` (XAMPP) atau `www` (Laragon), sehingga dapat diakses sebagai `http://localhost/mechain/`.

4. **Import database**:
   - Buka phpMyAdmin atau client MySQL lain.
   - Buat database baru, misalnya dengan nama `mechain_db`.
   - Import file `mechain/db/mechain_db.sql` ke dalam database tersebut.

5. **Sesuaikan konfigurasi koneksi database jika diperlukan**:  
   - Buka file `mechain/php/conn_db/db_conn.php`.  
   - Pastikan nama host, username, password, dan nama database sesuai dengan pengaturan MySQL lokal Anda.

6. **Jalankan website di browser**:  
   - Akses `http://localhost/mechain/index.html` untuk membuka halaman utama.  
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
