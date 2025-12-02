<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Register Bengkel</title>
        <link rel="icon" type="image/x-icon" href="../../img/MechainLogo.png">

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/animate.css">
        <link rel="stylesheet" type="text/css" href="../../css/styleMechanic.css" />
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
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
                                    <li class="active"><a href="<?php echo base_path('php/fiturMechanic/registBengkel.php'); ?>">Regist Bengkel</a></li>
                                    <li><a href="<?php echo base_path('php/fiturMechanic/artikel.php'); ?>">Article</a></li>
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
        <section class="cont">
            <header class="title" style="font-weight: bolder; font-size: 30px">Registration Form</header>
            <form action="../config/configBengkel.php" method="POST" class="form" enctype="multipart/form-data">
                <div class=" input-box">
                    <label>Nama Bengkel</label>
                    <input type="text" name="nama_bengkel" placeholder="Masukkan nama bengkel" required />
                </div>

                <div class="input-box">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Masukkan email" required />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Nomor WhatsApp</label>
                        <input type="number" name="noWA" placeholder="Nomor Handphone" required />
                    </div>
                </div>
                <div class="gender-box">
                    <label>Cek Servis</label>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="checkbox" id="check-male" name="servis[]" value="Sepeda" />
                            <label for="check-male">Sepeda</label>
                        </div>
                        <div class="gender">
                            <input type="checkbox" id="check-female" name="servis[]" value="Motor" />
                            <label for="check-female">Motor</label>
                        </div>
                        <div class="gender">
                            <input type="checkbox" id="check-other" name="servis[]" value="Mobil" />
                            <label for="check-other">Mobil</label>
                        </div>
                        <div class="gender">
                            <input type="checkbox" id="check-other" name="servis[]" value="Dan Lain-lain" />
                            <label for="check-other">Dan Lain-lain</label>
                        </div>
                    </div>
                </div>
                <div class="input-box address">
                    <label>Alamat Bengkel</label>
                    <input type="text" name="alamat_bengkel" placeholder="Alamat Bengkel" required />
                    <input type="text" name="link_maps" placeholder="Link Google Maps" required />
                    <a href="https://www.google.com/maps">Telusuri Maps</a>

                </div>
                <br>
                <label>Waktu Operasional</label>
                <div class="input-box column">
                    <input type="text" name="waktu_operasi" style="margin-top: 10px;" placeholder="cth: 07.00-22.00" required />
                    <input type="text" name="hari_operasi" style="margin-top: 10px;" placeholder="cth: Senin-Jum'at" required />
                </div>
                <label style="margin-top: 10px;">Deskripsi Bengkel</label>
                <div class="input-box column">
                    <input type="text" name="deskripsi" style="margin-top: 10px;" placeholder="cth: Bengkel dengan perlengkapan..." required />
                </div>
                <label style="margin-top: 10px;">Upload Foto Bengkel</label>
                <input type="file" name="foto">
                <button>Submit</button>
            </form>
        </section>

        <!--Script-->
        <script src=" ../../js/jquery.min.js"></script>
        <script src="../../js/jquery.easing.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/wow.js"></script>
        <script src="../../js/custom.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: ../login/index.php");
    exit();
}
?>