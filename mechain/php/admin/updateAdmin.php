<?php
include "../config/updateAdmin.php";
$id = $_GET["id"];
session_start();

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

    <title>Update Admin</title>
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
                <li><a href="http://localhost/mechain/php/users/admin.php">
                        <i class="fas fa-menorah"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="http://localhost/mechain/php/admin/repair.php">
                        <i class="fas fa-pen-to-square"></i>
                        <span class="nav-item">Repair</span>
                    </a></li>
                <li><a href="http://localhost/mechain/php/admin/bengkel.php">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-item">Bengkel</span>
                    </a></li>
                <li><a href="http://localhost/mechain/php/admin/artikel.php">
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
                <h1>Edit Data Admin</h1>
                <p class="text-muted">Click update after changing any information</p>
            </div>

            <?php
            $sql = "SELECT * FROM `admin` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="POST" style="width:100%; min-width:300px; margin-bottom: 10px;">
                    <div class="row mb-3">
                        <label class="form-label">Nama:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                    </div>

                    <div class="row mb-3">
                        <label class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                    </div>

                    <div class="row mb-3">
                        <label class="form-label">Password:</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="../users/admin.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>