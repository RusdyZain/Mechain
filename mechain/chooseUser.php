<?php
require_once __DIR__ . '/php/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select User</title>
    <link rel="icon" type="image/x-icon" href="img/MechainLogo.png">
    <!-- Font Awesome CDN-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/styleLoginChoose.css" />
  </head>
  <body>
    <section>
      <div class="row">
        <img src="img/MechainLogo.png" alt="">
      </div>
      <p class="sub-title">Login Server</p>
      <div class="row">
        <div class="column">
          <div class="card">
            <a href="<?php echo base_path('php/login/admin.php'); ?>">
              <div class="icon-wrapper">
                <i class="fas fa-user-tie"></i>
              </div>
              <h3>Admin</h3>
              <p>
                Sebagai Admin, Anda akan memiliki akses penuh dan kontrol tinggi
                terhadap sistem MECHAIN. Login sebagai Admin memberikan Anda
                otoritas tertinggi untuk mengawasi dan mengelola operasi
                sehari-hari bengkel dengan mudah dan efisien.
              </p>
            </a>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <a href="<?php echo base_path('php/login/user.php'); ?>">
            <div class="icon-wrapper">
              <i class="fas fa-users"></i>
            </div>
            <h3>
              User
            </h3>
            <p>
              Sebagai User, Anda adalah pengguna terdaftar yang dapat mengakses
              berbagai fitur dalam MECHAIN. Login sebagai User memberikan Anda
              kemampuan untuk mengatur dan mengurus kendaraan Anda dengan
              nyaman, melalui interaksi yang mudah dengan sistem bengkel.
            </p>
          </div>
        </a>
        </div>
        <div class="column">
          <div class="card">
            <a href="<?php echo base_path('php/login/bengkel.php'); ?>">
            <div class="icon-wrapper">
              <i class="fas fa-toolbox"></i>
            </div>
            <h3>
              Bengkel
            </h3>
            <p>
              Sebagai Pengguna Bengkel, Anda adalah pelanggan atau pengguna yang
              belum terdaftar di dalam MECHAIN. Dengan login sebagai Pengguna
              Bengkel, Anda dapat memperoleh pemahaman awal tentang layanan yang
              ditawarkan dan mengambil langkah pertama dalam menggunakan jasa
              bengkel tersebut.
            </p>
          </div>
          </a>
        </div>
      </div>
    </section>
  </body>
</html>
