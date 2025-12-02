<?php
require_once __DIR__ . '/php/config/config.php';

$serviceHighlights = [
    [
        'title' => 'Katalog Sparepart Premium',
        'desc' => 'Komponen OEM & aftermarket bergaransi untuk motor harian maupun hobi.',
        'icon' => 'fa-gears',
    ],
    [
        'title' => 'Jadwal Perawatan Cepat',
        'desc' => 'Booking bengkel rekanan di Mataram dalam hitungan menit lewat satu dashboard.',
        'icon' => 'fa-calendar-check',
    ],
    [
        'title' => 'Teknisi Bersertifikat',
        'desc' => 'Partner bengkel terkurasi dengan mekanik tersertifikasi dan SOP layanan yang rapi.',
        'icon' => 'fa-user-shield',
    ],
];

$spareParts = [
    [
        'name' => 'Paket Rem OEM',
        'brand' => 'Yamaha / Honda',
        'desc' => 'Brake shoe + master kit siap pasang, cocok untuk commuter.',
        'price' => 'Rp 350.000',
        'availability' => 'Ready Stock',
    ],
    [
        'name' => 'Aki Maintenance Free',
        'brand' => 'GS Astra',
        'desc' => 'Garansi 6 bulan, ideal untuk skutik injeksi.',
        'price' => 'Rp 420.000',
        'availability' => 'Terbatas',
    ],
    [
        'name' => 'Oli Fully Synthetic 1L',
        'brand' => 'Motul 7100',
        'desc' => 'Viscosity 10W-40, menjaga performa mesin touring.',
        'price' => 'Rp 210.000',
        'availability' => 'Ready Stock',
    ],
    [
        'name' => 'Drive Belt + Roller Kit',
        'brand' => 'Bando Racing',
        'desc' => 'Upgrade CVT untuk akselerasi lebih responsif.',
        'price' => 'Rp 550.000',
        'availability' => 'Pre-Order',
    ],
];

$serviceSteps = [
    ['title' => 'Diagnosis Digital', 'desc' => 'Input keluhan dan data motor, sistem rekomendasikan part & bengkel.'],
    ['title' => 'Kalkulasi Transparan', 'desc' => 'Harga part & jasa ditampilkan sebelum booking, tanpa biaya tersembunyi.'],
    ['title' => 'Booking & Tracking', 'desc' => 'Atur jadwal, dapatkan notifikasi status perbaikan secara real-time.'],
];

$workshops = [
    [
        'name' => 'Family Motor Premium Service',
        'address' => 'Jl. Dr. Soetomo No.1, Karang Baru, Mataram',
        'contact' => '0876-1615-28826',
        'services' => 'Tune-up, kelistrikan, upgrade CVT',
        'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.250141901528!2d116.1084611!3d-8.57193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc1b5cc7e26bd%3A0x25b514ce550720d1!2sbengkel%20family%20motor!5e0!3m2!1sid!2sid!4v1683305807126!5m2!1sid!2sid',
    ],
    [
        'name' => 'Tirta Sari Motor',
        'address' => 'Jl. Arif Rahman Hakim No.7, Mataram Timur',
        'contact' => '0831-2956-6223',
        'services' => 'Perawatan injeksi, spooring, ban & balancing',
        'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.0659708598446!2d116.107711!3d-8.589656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf616d7e1045%3A0x2c0fc2fe82bf8dbb!2sBengkel%20Tirta%20Sari%20Motor!5e0!3m2!1sid!2sid!4v1683304956097!5m2!1sid!2sid',
    ],
    [
        'name' => 'Cahaya Motor Bengkel',
        'address' => 'Jl. Guru Bangkol Blok A No.3, Pagesangan Timur',
        'contact' => '0896-6543-5221',
        'services' => 'Detailing, restorasi, layanan darurat 24 jam',
        'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.001921368718!2d116.10064530000001!3d-8.5958121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf654a9b881f%3A0x44f4a9b389afd36a!2sBengkel%20MULTI%20ENGINE%20SERVICE!5e0!3m2!1sid!2sid!4v1683305528054!5m2!1sid!2sid',
    ],
];
?>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Mechain – Sparepart & Bengkel Motor Mataram</title>
        <link rel="icon" type="image/x-icon" href="img/MechainLogo.png">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/landing.css?v=2" />
    </head>

    <body>
        <div class="announcement-bar">
            Mataram Service Hub · Promo Launching: Gratis inspeksi untuk booking pertama!
        </div>
        <header class="hero" id="header">
            <nav class="navbar navbar-expand-lg navbar-dark main-nav">
                <a class="navbar-brand" href="<?php echo base_path('index.php'); ?>">MECHAIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#spareparts">Sparepart</a></li>
                        <li class="nav-item"><a class="nav-link" href="#service-flow">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bengkel">Bengkel Mataram</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Kami</a></li>
                    </ul>
                    <div class="nav-cta">
                        <a class="btn btn-light btn-sm"
                            href="<?php echo base_path('chooseUser.php'); ?>">Masuk/Daftar</a>
                    </div>
                </div>
            </nav>
            <div class="hero-inner">
                <div class="hero-copy">
                    <p class="eyebrow">Platform Sparepart & Bengkel</p>
                    <h1>Temukan Part & Mekanik Andal untuk Motor Anda di Mataram</h1>
                    <p>Dari katalog komponen OEM, layanan servis, hingga booking bengkel rekanan. Semua terhubung dalam
                        satu
                        platform dengan data real-time.</p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="<?php echo base_path('chooseUser.php'); ?>">Mulai Booking</a>
                        <a class="btn btn-outline-light" href="#spareparts">Lihat Katalog</a>
                    </div>
                    <div class="hero-metrics">
                        <div>
                            <strong>1200+</strong>
                            <span>Sparepart Terdaftar</span>
                        </div>
                        <div>
                            <strong>30+</strong>
                            <span>Bengkel Terseleksi</span>
                        </div>
                        <div>
                            <strong>4.9/5</strong>
                            <span>Rata-rata rating pengguna</span>
                        </div>
                    </div>
                </div>
                <div class="hero-visual">
                    <figure>
                        <img src="foto/3883323.jpg" alt="Mekanik servis motor" />
                        <figcaption>
                            <strong>Tim Kurasi Mechain</strong>
                            <p>Kami pastikan setiap part & bengkel sesuai standar OEM.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </header>

        <section class="stats-band">
            <div>
                <strong>18</strong>
                <span>Tahun pengalaman kolektif</span>
            </div>
            <div>
                <strong>92%</strong>
                <span>Pelanggan repeat order</span>
            </div>
            <div>
                <strong>15</strong>
                <span>Mitigasi klaim garansi / bln</span>
            </div>
            <div>
                <strong>6 Jam</strong>
                <span>Rata-rata SLA pengerjaan</span>
            </div>
        </section>

        <main>
            <section class="highlight-section container" id="features">
                <div class="section-heading">
                    <p class="section-label">Kenapa Mechain?</p>
                    <h2 class="section-title">Standar Baru Servis dan Penjualan Sparepart Motor</h2>
                    <p>Platform menyeluruh untuk manajemen sparepart, booking, dan monitoring kualitas bengkel di
                        wilayah
                        Mataram.</p>
                </div>
                <div class="highlight-grid">
                    <?php foreach ($serviceHighlights as $item) : ?>
                    <article class="highlight-card">
                        <i class="fa <?php echo $item['icon']; ?>"></i>
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['desc']; ?></p>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="sparepart-section" id="spareparts">
                <div class="container">
                    <div class="section-heading">
                        <p class="section-label">Katalog Unggulan</p>
                        <h2 class="section-title">Sparepart Favorit Customer Fleet</h2>
                        <p>Semua part dapat dibeli langsung atau dipaketkan dengan layanan pemasangan di bengkel mitra.
                        </p>
                    </div>
                    <div class="sparepart-grid">
                        <?php foreach ($spareParts as $part) : ?>
                        <article class="sparepart-card">
                            <div class="card-badge"><?php echo $part['brand']; ?></div>
                            <h3><?php echo $part['name']; ?></h3>
                            <p><?php echo $part['desc']; ?></p>
                            <div class="price-row">
                                <span class="price"><?php echo $part['price']; ?></span>
                                <span class="stock"><?php echo $part['availability']; ?></span>
                            </div>
                            <div class="card-actions">
                                <a href="<?php echo base_path('chooseUser.php'); ?>"
                                    class="btn btn-primary btn-sm">Pesan &
                                    Pasang</a>
                                <button type="button" class="btn btn-link btn-sm">Detail Produk</button>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="service-flow container" id="service-flow">
                <div class="section-heading">
                    <p class="section-label">Cara Kerja</p>
                    <h2 class="section-title">Servis Motor Tanpa Ribet</h2>
                </div>
                <div class="flow-grid">
                    <?php foreach ($serviceSteps as $index => $step) : ?>
                    <article class="flow-card">
                        <div class="step-number"><?php echo $index + 1; ?></div>
                        <h3><?php echo $step['title']; ?></h3>
                        <p><?php echo $step['desc']; ?></p>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="workshop-section" id="bengkel">
                <div class="container">
                    <div class="section-heading">
                        <p class="section-label">Partner Lokal</p>
                        <h2 class="section-title">Bengkel Terpercaya di Mataram</h2>
                        <p>Pilih bengkel sesuai kebutuhan: perawatan harian, upgrade performa, atau layanan darurat.</p>
                    </div>
                    <div class="workshop-grid">
                        <?php foreach ($workshops as $workshop) : ?>
                        <article class="workshop-card">
                            <div class="workshop-map">
                                <iframe src="<?php echo $workshop['map']; ?>" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="workshop-info">
                                <h3><?php echo $workshop['name']; ?></h3>
                                <p class="workshop-address"><?php echo $workshop['address']; ?></p>
                                <p class="workshop-services"><?php echo $workshop['services']; ?></p>
                                <p class="workshop-contact"><i class="fa fa-phone"></i>
                                    <?php echo $workshop['contact']; ?>
                                </p>
                                <a class="btn btn-outline-primary btn-sm"
                                    href="<?php echo base_path('chooseUser.php'); ?>">Booking Sekarang</a>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="cta-section" id="contact">
                <div class="container cta-flex">
                    <div>
                        <p class="section-label">Siap Upgrade Armada Motor Anda?</p>
                        <h2 class="section-title">Tim Mechain siap membantu kurasi sparepart & jadwal servis terbaik.
                        </h2>
                        <p>Konsultasi gratis untuk pemilik bengkel, komunitas motor, dan corporate fleet.</p>
                    </div>
                    <div class="cta-actions">
                        <a class="btn btn-primary" href="<?php echo base_path('chooseUser.php'); ?>">Daftar Sebagai
                            Mitra</a>
                        <a class="btn btn-outline-light" href="mailto:hello@mechain.id">Email Kami</a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container footer-flex">
                <div>
                    <h4>Mechain</h4>
                    <p>Platform terpadu untuk sparepart dan bengkel kendaraan roda dua di Mataram.</p>
                </div>
                <div>
                    <p class="footer-label">Hubungi Kami</p>
                    <p>hello@mechain.id</p>
                    <p>+62 812-3456-7890</p>
                </div>
                <div>
                    <p class="footer-label">Alamat Operasional</p>
                    <p>Jl. Majapahit No. 50, Mataram, Nusa Tenggara Barat</p>
                </div>
            </div>
            <p class="text-center mt-4 mb-0">&copy; <?php echo date('Y'); ?> Mechain. All rights reserved.</p>
        </footer>

        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    </body>

    </html>
