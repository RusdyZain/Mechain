<?php
session_start();
include "../conn_db/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Artikel</title>
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
        <link rel="stylesheet" href="../../css/base.css">
        <link rel="stylesheet" href="../../css/vendor.css">
        <link rel="stylesheet" href="../../css/main.css">

    </head>

    <body id="top" style="background-color: black;">
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
                                    <li class="active"><a href="<?php echo base_path('php/fiturMechanic/artikel.php'); ?>">Article</a></li>
                                    <li><a href="<?php echo base_path('php/fiturMechanic/location.php'); ?>">Location</a></li>
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
        <section id="bricks" style="padding-top: 100px;">
            <div class="row masonry">
                <!-- wrapper -->
                <div class="bricks-wrapper">
                    <div class="grid-sizer"></div>
                    <div class="brick entry featured-grid animate-this">
                        <div class="entry-content">
                            <div id="featured-post-slider" class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="featured-post-slide">
                                            <div class="post-background" style="background-image:url('../../img/artikel/oli.jpg')">
                                            </div>
                                            <div class="overlay"></div>

                                            <div class="post-content">
                                                <ul class="entry-meta">
                                                    <li>2 Juli 2021</li>
                                                    <li><a href="#">mobil.com</a></li>
                                                </ul>

                                                <h1 class="slide-title"><a href="https://www.mobil.co.id/id-id/consumer/faqs-and-tips/bike-and-scooter-faqs-and-tips/tips-mencari-waktu" title="">Kapan Waktu Ganti Oli Motor Yang Tepat?</a></h1>
                                            </div>

                                        </div>
                                    </li> <!-- /slide -->

                                    <li>
                                        <div class="featured-post-slide">

                                            <div class="post-background" style="background-image:url('../../img/artikel/Cek-tekanan-udara-ban-motor.jpg')">
                                            </div>

                                            <div class="overlay"></div>

                                            <div class="post-content">
                                                <ul class="entry-meta">
                                                    <li>7 Maret 2022</li>
                                                    <li><a href="#">Momotor.id</a></li>
                                                </ul>

                                                <h1 class="slide-title"><a href="https://momotor.id/news/perawatan-ban-motor/" title="">Tips
                                                        Perawatan Ban Motor Supaya Lebih Awet, Lakukan Beberapa Tips
                                                        Berikut!</a></h1>
                                            </div>

                                        </div>
                                    </li> <!-- /slide -->

                                    <li>
                                        <div class="featured-post-slide">

                                            <div class="post-background" style="background-image:url('../../img/artikel/cara-merawat-motor-scaled.jpg');">
                                            </div>

                                            <div class="overlay"></div>

                                            <div class="post-content">
                                                <ul class="entry-meta">
                                                    <li> 12 Agustus 2023</li>
                                                    <li><a href="#" class="author">tugu.com</a></li>
                                                </ul>

                                                <h1 class="slide-title"><a href="https://tugu.com/artikel/ini-dia-cara-merawat-motor-baru-agar-tetap-awet" title="">Ini Dia Cara Merawat Motor Baru Agar Tetap Awet!</a></h1>
                                            </div>

                                        </div>
                                    </li> <!-- end slide -->

                                </ul> <!-- end slides -->
                            </div> <!-- end featured-post-slider -->
                        </div> <!-- end entry content -->
                    </div>

                    <?php
                    $show = mysqli_query($conn, "SELECT * FROM artikel");
                    while ($resutl = mysqli_fetch_array($show)) {
                    ?>
                        <article class="brick entry format-standard animate-this">

                            <div class="entry-thumb">
                                <a href="<?php echo $resutl['link'] ?>" class="thumb-link">
                                    <img src="../../foto/<?php echo $resutl['foto'] ?>" alt="building">
                                </a>
                            </div>

                            <div class="entry-text">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <a><?php echo $resutl['penerbit'] ?></a>
                                        </span>
                                    </div>

                                    <h1 class="entry-title"><a href="<?php echo $resutl['link'] ?>">
                                            <?php echo $resutl['judul'] ?></a></h1>

                                </div>
                                <div class="entry-excerpt"><?php echo $resutl['redaksi'] ?></div>
                        </article> <!-- end article -->
                    <?php
                    }
                    ?>
                </div> <!-- end wrapper -->
            </div> <!-- end row -->


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

            <!--/footer-->

            <div id="preloader">
                <div id="loader"></div>
            </div>

            <script src="../../js/jquery-2.1.3.min.js"></script>
            <script src="../../js/plugins.js"></script>
            <script src="../../js/jquery.appear.js"></script>
            <script src="../../js/main.js"></script>
            <script src="../../js/modernizr.js"></script>
            <script src="../../js/pace.min.js"></script>

            <!--Script-->
            <script src="../../js/jquery.min.js"></script>
            <script src="../../js/jquery.easing.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>
            <script src="../../js/wow.js"></script>
            <script src="../../js/custom.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>