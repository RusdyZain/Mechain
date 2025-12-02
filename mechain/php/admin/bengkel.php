<?php
include "../conn_db/db_conn.php";
session_start();
require_once __DIR__ . '/../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Mechanic</title>
    <link rel="icon" type="image/x-icon" href="../../img/MechainLogo.png">

    <link rel="stylesheet" href="../../css/styleDashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        ?>
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
            <div class="main-top">
                <h1>Bengkel</h1>
            </div>
            <section class="attendance">
                <div class="attendance-list">
                    <h1>Pemilik Bengkel</h1>
                    <a href="../login/bengkel.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pemilik Bengkel</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `mechanic`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["username"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["email"] ?>
                                    </td>
                                    <td>
                                        <a style="width: 0px;" href="../config/updateBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="attendance-list">
                    <h1>Bengkel List</h1>
                    <table class="table" id="bengkel-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Bengkel</th>
                                <th>Email</th>
                                <th>No.WA</th>
                                <th>Servis</th>
                                <th>Alamat Bengkel</th>
                                <th>Waktu Operasi</th>
                                <th>Hari Operasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `bengkel`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["nama_bengkel"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["email"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["noWA"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["servis"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["alamat_bengkel"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["waktu_operasi"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["hari_operasi"] ?>
                                    </td>
                                    <td>
                                        <a style="width: 0px;" href="updateBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>
    <script src="../../js/layar.js"></script>
</body>

</html>