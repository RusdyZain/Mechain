<?php
session_start();
include "../conn_db/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Location</title>
        <link rel="icon" type="image/x-icon" href="../../img/MechainLogo.png">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/animate.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/styleLocation.css">
    </head>

    <body>
        <header id="header">
            <div class="bg-color">
                <!--nav-->
                <nav class="nav navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="fa fa-bars"></span>
                                </button>
                                <a href="<?php echo base_path('index.php'); ?>" class="navbar-brand">MECHAIN</a>
                            </div>
                            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo base_path('php/users/mechanic.php'); ?>">Home</a></li>
                                    <li><a href="<?php echo base_path('php/fiturMechanic/registBengkel.php'); ?>">Regist Bengkel</a></li>
                                    <li><a href="<?php echo base_path('php/fiturMechanic/artikel.php'); ?>">Article</a></li>
                                    <li class="active"><a href="<?php echo base_path('php/fiturMechanic/location.php'); ?>">Location</a></li>
                                    <li><a href="<?php echo base_path('php/users/mechanic.php#contact'); ?>">Contact</a></li>
                                    <li style="padding-left: 30px;"><a>
                                            <a href="../login/logout.php">
                                                <?php echo $_SESSION['name']; ?>
                                            </a>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <section id="about" class="about">
            <?php
            $show = mysqli_query($conn, "SELECT bengkel.nama_bengkel, bengkel.link_maps, bengkel.deskripsi, bengkel.waktu_operasi, bengkel.hari_operasi, bengkel.foto, bengkel.servis, mechanic.name FROM bengkel, mechanic WHERE bengkel.id = mechanic.id");
            while ($resutl = mysqli_fetch_array($show)) {
            ?>
                <div class="row">
                    <div class="about-img"><a href="<?php echo $resutl['link_maps'] ?>">
                            <img src="../../foto/<?php echo $resutl['foto'] ?>">
                        </a>
                        <div class="whatsapp">
                            <h5> Waktu Operasional: <?php echo $resutl['waktu_operasi'] ?> </h5>
                            <h5> Hari Operasional: <?php echo $resutl['hari_operasi'] ?> </h5>
                            <h5> Pelayanan Servis: <?php echo $resutl['servis'] ?> </h5>
                            <div class="info">
                                <a href="https://wa.me/qr/RJYDYURBCAF2H1" class="cta" target="_blank">Chat Sekarang</a>
                                <a href="<?php echo $resutl['link_maps'] ?>" class="cta">Telusuri Lokasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <h3 style="font-weight: bold;">
                            <?php echo $resutl['nama_bengkel'] ?>
                        </h3>
                        <p>
                            <?php echo $resutl['deskripsi'] ?>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
        <!-- About Section End -->

        <!--Footer-->
        <footer class="" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 footer-copyright">
                        © Zain reserved
                        <div class="credits">
                            Designed by <a>Rusdy Team</a>
                        </div>
                    </div>
                    <div class="col-sm-5 footer-social">
                        <div class="pull-right hidden-xs hidden-sm">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/footer-->

        <!--Script-->
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/jquery.easing.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/wow.js"></script>
        <script src="../../js/custom.js"></script>
        <script defer src="../../js/reveal.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>