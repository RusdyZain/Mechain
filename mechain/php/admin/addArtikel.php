<?php
session_start();
require_once __DIR__ . '/../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/styleDashboard.css">

    <title>Add Artikel</title>
    <link rel="icon" type="image/x-icon" href="../../img/MechainLogo.png">

</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <?php
                        $nama = $_SESSION['name'];
                        $huruf_pertama = substr($nama, 0, 1);
                        ?>
                        <span class="nav-item"><?php echo $huruf_pertama; ?></span>
                    </a></li>
                <li><a href="<?php echo base_path('php/users/admin.php'); ?>">
                        <i class="fas fa-menorah"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="<?php echo base_path('php/admin/repair.php'); ?>">
                        <i class="fas fa-pen-to-square"></i>
                        <span class="nav-item">Repair</span>
                    </a></li>
                <li><a href="<?php echo base_path('php/admin/bengkel.php'); ?>">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-item">Bengkel</span>
                    </a></li>
                <li><a href="<?php echo base_path('php/admin/artikel.php'); ?>">
                        <i class="fas fa-newspaper"></i>
                        <span class="nav-item">Artikel</span>
                    </a></li>

                <li><a href="../login/logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>
        <section class="main">
            <div class="text-center mb-4">
                <h1>Data Artikel</h1>
                <p class="text-muted">Click update after changing any information</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form class="form" action="../config/configArtikel.php" method="POST" style="width:100%; min-width:300px; margin-bottom: 10px;" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="form-label">Judul Artikel:</label>
                        <input type="text" class="form-control" name="judul" placeholder="judul..."">
                    </div>
                    <div class=" row mb-3">
                        <label class="form-label">Penerbit Artikel:</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="kantor..."">
                    </div>
                    <div class=" row mb-3">
                        <label class="form-label">Link Artikel:</label>
                        <input type="text" class="form-control" name="link" placeholder="link..."">
                    </div>
                    <div class=" row mb-3">
                        <label class="form-label">Redaksi Artikel:</label>
                        <input type="text" class="form-control" name="redaksi" placeholder="Redaksi..."">
                    </div>
                    <div class=" row mb-3">
                        <label style=" margin-top: 10px;">Upload Foto Artikel: </label>
                        <input type="file" name="foto">
                    </div><br>

                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <a href="artikel.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>