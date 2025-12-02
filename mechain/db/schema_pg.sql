-- Schema and seed data for PostgreSQL

CREATE TABLE IF NOT EXISTS admin (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (id, name, email, password) VALUES
    (1, 'Rifki Rusdi Satma Putra', 'ryanfajri28@gmail.com', '1234567Soraya'),
    (3, 'Baiq Soraya Aprilia Monica', 'bqsoraya@gmail.com', '123'),
    (4, 'Bagus Arya', 'arya@gmail.com', '123')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('admin','id'), COALESCE((SELECT MAX(id) FROM admin), 0) + 1, false);

CREATE TABLE IF NOT EXISTS artikel (
    id SERIAL PRIMARY KEY,
    link VARCHAR(255) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    redaksi TEXT NOT NULL,
    penerbit VARCHAR(255) NOT NULL,
    foto VARCHAR(1000) NOT NULL
);

INSERT INTO artikel (id, link, judul, redaksi, penerbit, foto) VALUES
    (1, 'https://www.mobil.co.id/id-id/consumer/faqs-and-tips/bike-and-scooter-faqs-and-tips/tips-mencari-waktu', 'Kapan Waktu Ganti Oli Motor Yang Tepat?', 'Mengganti oli motor, termasuk oli motor matic, memang perlu dilakukan secara berkala agar mesin motor bisa bekerja dengan baik. Pasalnya, oli memiliki peran sebagai pelumas utama di dalam mesin dan kinerja serta daya tahannya dipengaruhi oleh panas dan kerak yang muncul akibat terjadinya pembakaran. Selain itu, oli juga berfungsi untuk menyebarkan panas ke seluruh bagian mesin.', 'mobil.co.id', 'article-image-1-fs-md.jpg'),
    (2, 'https://momotor.id/news/perawatan-ban-motor/', 'Perawatan Ban Motor Supaya Lebih Awet, Lakukan Beberapa Tips Berikut!', 'momotor.id - Perawatan pada ban sepeda motor baik itu matic ataupun manual perlu dilakukan guna memastikan kenyamanan dan keamanan berkendara tak terganggu selama perjalanan.', 'Momotor.id', 'gass.jpg'),
    (3, 'https://tugu.com/artikel/ini-dia-cara-merawat-motor-baru-agar-tetap-awet', 'Ini Dia Cara Merawat Motor Baru Agar Tetap Awet!', 'tugu.com-kamu tetap harus melakukan servis rutin sehingga motor bisa awet digunakan dalam jangka panjang. Perawatan motor baru akan sangat berpengaruh pada kualitas mesin kendaraan itu sendiri. Oleh karena itu, pastikan kamu merawat motor baru dengan baik dan benar. Berikut panduan selengkapnya.', 'tugu.com', 'cara-merawat-motor-scaled.jpg'),
    (4, 'https://www.cnnindonesia.com/otomotif/20230224105251-600-918282/5-cara-merawat-kampas-rem-motor-agar-awet-dan-pakem', 'Cara Merawat Kampas Rem Motor agar Awet dan Pakem', 'CNN Indonesia - Rem adalah komponen penting untuk mengurangi serta menghentikan laju kendaraan. Penting untuk mengetahui cara merawat kampas rem motor untuk mencegah insiden ketika berkendara Mengingat, salah satu penyebab kecelakaan lalu lintas disebabkan oleh tidak berfungsinya rem kendaraan bermotor', 'www.cnnindonesia.com', 'ilustrasi-rem-motor-3_169.jpeg'),
    (5, 'https://ruber.id/coolant-motor-pentingnya-mengenal-cairan-pendingin-pada-kendaraan/', 'Coolant Motor, Pentingnya Mengenal Cairan Pendingin pada Kendaraan', 'ruber.id – Ketika Anda mengendarai sepeda motor, salah satu komponen penting yang harus Anda perhatikan adalah sistem pendingin mesin, atau Coolant (Cairan pendingin). Sistem ini berfungsi untuk menjaga suhu mesin agar tetap optimal selama operasi, mencegah mesin dari overheating, dan menjaga kinerja mesin tetap optimal.', 'www.ruber.id', 'Coolant-Motor-Pentingnya-Mengenal-Cairan.jpg')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('artikel','id'), COALESCE((SELECT MAX(id) FROM artikel), 0) + 1, false);

CREATE TABLE IF NOT EXISTS bengkel (
    id SERIAL PRIMARY KEY,
    nama_bengkel VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    noWA VARCHAR(100) NOT NULL,
    servis VARCHAR(255) NOT NULL,
    alamat_bengkel VARCHAR(255) NOT NULL,
    link_maps VARCHAR(255) NOT NULL,
    waktu_operasi VARCHAR(255) NOT NULL,
    hari_operasi VARCHAR(255) NOT NULL,
    deskripsi VARCHAR(10000) NOT NULL,
    foto VARCHAR(1000) NOT NULL
);

INSERT INTO bengkel (id, nama_bengkel, email, noWA, servis, alamat_bengkel, link_maps, waktu_operasi, hari_operasi, deskripsi, foto) VALUES
    (1, 'FamilyMotor', 'family@gmail.com', '0876161528826', 'Motor, Mobil', 'jl dr soetomo ruko no 1 marong jamak selatan, Karang Baru, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83122', 'https://goo.gl/maps/Zd88fAxtKFKAs9jM7', '08.00 - 22.00', 'Senin-Minggu', 'Toko Bengkel Family adalah tempat yang ideal bagi keluarga dan individu untuk memperbaiki dan merawat kendaraan mereka. Dengan fokus pada kualitas pelayanan dan kepuasan pelanggan, toko bengkel ini menawarkan berbagai layanan seperti perbaikan mesin, tune-up, perawatan rutin, dan penggantian suku cadang kendaraan. Dengan menggunakan peralatan dan teknologi terkini, bengkel ini memiliki tim mekanik berpengalaman yang siap membantu dalam memperbaiki berbagai jenis kendaraan. Dengan suasana yang ramah dan nyaman, Toko Bengkel Family memberikan jaminan bahwa kendaraan Anda akan diperbaiki dengan profesionalisme dan keahlian, sehingga pelanggan dapat kembali ke jalan dengan kendaraan yang berfungsi dengan baik dan aman.', '2022-10-26.jpg'),
    (2, 'Bengkel Tirta Sari Motor', 'tirtasari@gmail.com', '083129566223', 'Motor', 'Jl. Arif Rahman Hakim No.7, Mataram Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83217', 'https://goo.gl/maps/Y3VFUqH5SY7DUZKv9?coh=178572&entry=tt', '08.00-17.00', 'Setiap Hari', 'Bengkel Tirta Sari Motor adalah bengkel terpercaya dan berkualitas tinggi yang menyediakan perbaikan dan perawatan kendaraan bermotor. Dengan pelayanan profesional, teknisi handal, harga terjangkau, dan waktu penyelesaian yang cepat, bengkel ini menjadi pilihan ideal bagi pemilik sepeda motor yang mencari hasil yang memuaskan.', 'tirta.jpg'),
    (3, 'Ardi Motor', 'ardi123@gmail.com', '082340004768', 'Motor', 'Jl. A. A Gede Ngurah, Sapta Marga, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83232', 'https://goo.gl/maps/vArT9qsAbgsTEpnc6?coh=178572&entry=tt', '08.00-17.30', 'Setiap Hari', 'Ardi Motor adalah sebuah bengkel perbaikan dan perawatan kendaraan bermotor yang terkenal dengan layanan yang handal dan berkualitas. Bengkel ini menyediakan berbagai layanan mulai dari perbaikan mesin, pergantian suku cadang, hingga perbaikan bodi kendaraan. Dengan tim teknisi yang berpengalaman dan menggunakan peralatan modern, Ardi Motor dapat memberikan solusi yang efisien dan memuaskan bagi para pelanggan. Bengkel ini juga terkenal dengan harga yang kompetitif dan pelayanan yang ramah, sehingga pelanggan merasa puas dan percaya untuk mempercayakan perbaikan kendaraan mereka kepada Ardi Motor.', 'ardi.jpg'),
    (4, 'Cahaya Motor Bengkel', 'cahaya111@gmail.com', '089665435221', 'Motor', 'Jl. Guru Bangkol Blok A No.3, Pagesangan Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', 'https://goo.gl/maps/cYKvSFUu66ghEriy9?coh=178572&entry=tt', '08.00-17.00', 'Setiap Hari', 'Cahaya Motor Bengkel adalah bengkel perbaikan kendaraan bermotor terpercaya dengan pelayanan prima. Mereka menawarkan layanan perbaikan mesin, servis berkala, pergantian suku cadang, dan perbaikan bodi. Dengan tenaga kerja ahli, peralatan modern, harga kompetitif, dan waktu penyelesaian cepat, mereka memberikan kepuasan pelanggan yang optimal.', 'cahaya.jpg'),
    (5, 'Bagus Motor', 'bagus_123@gmail.com', '082339409917', 'Motor', 'Jl. Gajah Mada No.22, Pagesangan, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83116', 'https://goo.gl/maps/1uwndo6BbTZwTpjp9?coh=178572&entry=tt', '08.00-17.00', 'Senin-Sabtu', 'Bagus Motor adalah bengkel perbaikan kendaraan bermotor yang terkenal dengan kualitas pelayanan yang unggul. Bengkel ini menyediakan layanan perbaikan mesin, servis berkala, pergantian suku cadang, dan perbaikan bodi kendaraan. Dengan tenaga kerja terampil dan profesional, Bagus Motor mampu memberikan solusi perbaikan yang efisien dan memuaskan bagi pelanggan. Bengkel ini juga dikenal dengan harga yang kompetitif dan waktu penyelesaian yang cepat, sehingga memberikan kepuasan bagi pelanggan. Bagus Motor adalah pilihan yang tepat bagi pemilik kendaraan yang menginginkan perbaikan berkualitas tinggi.', 'bagus.jpg'),
    (6, 'Sumber Kencana Motor', 'kencana0@gmail.com', '370640519', 'Motor', 'Jl. Sultan Kaharudin No.3C, Pagesangan, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83115', 'https://goo.gl/maps/VeLPRWFSkaitJQns7?coh=178572&entry=tt', '08.00-18.00', 'Senin-Sabtu', 'Sumber Kencana Motor adalah sebuah bengkel perbaikan kendaraan bermotor yang terpercaya dan terkenal di wilayahnya. Bengkel ini menyediakan berbagai layanan seperti perbaikan mesin, servis berkala, pergantian suku cadang, dan perbaikan bodi kendaraan. Dengan tenaga kerja yang ahli dan berpengalaman, Sumber Kencana Motor mampu memberikan solusi perbaikan yang efektif dan memuaskan bagi pelanggan. Bengkel ini juga terkenal dengan kualitas pelayanan yang baik, harga yang kompetitif, dan waktu penyelesaian yang cepat. Sumber Kencana Motor menjadi pilihan yang tepat bagi pemilik kendaraan yang ingin mendapatkan perbaikan yang berkualitas dan layanan yang profesional.', 'kencana.jpg')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('bengkel','id'), COALESCE((SELECT MAX(id) FROM bengkel), 0) + 1, false);

CREATE TABLE IF NOT EXISTS contact (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

INSERT INTO contact (id, name, email, subject, message) VALUES
    (1, 'Rifki Rusdi Satma Putra', 'ryanfajri28@gmail.com', 'Hello', ''),
    (2, 'Rifki Rusdi Satma Putra', 'ryanfajri28@gmail.com', 'Hello', ''),
    (3, 'Rifki Rusdi Satma Putra', 'ryanfajri28@gmail.com', 'Hello', 'Hello World')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('contact','id'), COALESCE((SELECT MAX(id) FROM contact), 0) + 1, false);

CREATE TABLE IF NOT EXISTS mechanic (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    noHP VARCHAR(255) NOT NULL
);

INSERT INTO mechanic (id, name, username, email, password, noHP) VALUES
    (1, 'Family motor', 'family', 'family@gmail.com', '123', '08776575928'),
    (2, 'DhiraBengkel', 'dhira', 'dhira@gmail.com', '123', '087652653892'),
    (3, 'SorayaBengkel', 'Sor', 'bengkel@gmail.com', '123', '08765276528'),
    (4, 'Tirta Sari', 'TirtaS', 'tirtasari@gmail.com', 'tirta123', '083129566223'),
    (5, 'Ardi', 'Ardiii', 'ardi123@gmail.com', 'ardi321', '082340004768'),
    (6, 'Cahaya', 'Cahaya99', 'cahaya111@gmail.com', 'cahaya99', '089665435221'),
    (7, 'Bagus', 'Bagus_', 'bagus_123@gmail.com', 'bagus0', '082339409917'),
    (8, 'Kencana', 'Kencana99', 'kencana0@gmail.com', 'kencana123', '370640519')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('mechanic','id'), COALESCE((SELECT MAX(id) FROM mechanic), 0) + 1, false);

CREATE TABLE IF NOT EXISTS repair (
    id SERIAL PRIMARY KEY,
    kategori VARCHAR(255) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    foto VARCHAR(1000) NOT NULL,
    link TEXT NOT NULL
);

INSERT INTO repair (id, kategori, judul, deskripsi, foto, link) VALUES
    (1, 'Motor', 'Cara mengganti oli Motor', 'Halooo guys ! Selamat datang kembali di Kiat Chanel☺️Jadi kali ini Kiat Chanel berbagi pengalaman cara mengganti oli, mudah lo guys, yuk simak vidionya☺️☺️.Semoga bermanfaat☺️Semoga terhibur☺️🙏🏽.', 'hqdefault.webp', 'https://youtu.be/CH53nmTuSF4'),
    (2, 'Motor', 'Cara Melepas Dan Memasang Busi Sepeda Motor Yang Tepat - Cara Mengganti Busi Motor', 'Cara Melepas Dan Memasang Busi Sepeda Motor Yang Tepat - Cara Mengganti Busi Motor.Busi mempunyai peran penting  untuk kendaraan,sebaba busi sebagai alat untuk membakar campuran bahan bakar dan udara didalam mesin.', 'hqdefault (1).webp', 'https://youtu.be/3JiWZKdOx5E'),
    (3, 'Motor', 'CARA GANTI FILTER UDARA • KAPAN HARUS GANTI SARINGAN UDARA / FILTER UDARA', 'Hello sobat bengkel hd...Semoga Video ini bermanfaat.', 'hqdefault (2).webp', 'https://youtu.be/2xrsWNwgSbk'),
    (4, 'Motor', 'Cara Pasang Roller Dengan Benar Berisik Hilang', '#pasangroller #rollercvt https://www.rumputteki.com/2017/08/ca...Update posting terbaru di instagram https://www.instagram.com/rumputtekic...', 'hqdefault (3).webp', 'https://youtu.be/aoGPei6fgko')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('repair','id'), COALESCE((SELECT MAX(id) FROM repair), 0) + 1, false);

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO users (id, user_name, password, name) VALUES
    (1, 'rusdy', '123', 'Rifki Rusdi Satma Putra')
ON CONFLICT (id) DO NOTHING;

SELECT setval(pg_get_serial_sequence('users','id'), COALESCE((SELECT MAX(id) FROM users), 0) + 1, false);

