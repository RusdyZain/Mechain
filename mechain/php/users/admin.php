<?php
include "../conn_db/db_conn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/x-icon" href="../../img/MechainLogo.png">
    <link rel="stylesheet" href="../../css/styleDashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="<?php echo base_path('vendor/fontawesome/css/all.min.css'); ?>" />
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
                        <i class="fas fa-menorah" ></i>
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
                <h1>Dashboard</h1>
            </div>
            <div class="user-grid">
                <div class="user-box">
                    <?php
                    $stmt = $conn->query("SELECT COUNT(*) AS total_users FROM admin");
                    $totalUsers = $stmt->fetchColumn();
                    ?>

                    <i class="fas fa-users"></i>
                    <h2><?php echo $totalUsers; ?></h2>
                    <p>Total Admin</p>
                </div>
                <div class="user-box">
                    <?php
                    $stmt = $conn->query("SELECT COUNT(*) AS total_users FROM mechanic");
                    $totalUsers = $stmt->fetchColumn();
                    ?>

                    <i class="fas fa-users"></i>
                    <h2><?php echo $totalUsers; ?></h2>
                    <p>Total Pengguna Bengkel</p>
                </div>
                <div class="user-box">
                    <?php
                    $stmt = $conn->query("SELECT COUNT(*) AS total_users FROM users");
                    $totalUsers = $stmt->fetchColumn();
                    ?>

                    <i class="fas fa-users"></i>
                    <h2><?php echo $totalUsers; ?></h2>
                    <p>Total Users</p>
                </div>
            </div>

            <div class="grid-container">
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
                            $stmt = $conn->query("SELECT * FROM mechanic");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["username"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
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
                    <a href="../login/bengkel.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Bengkel</th>
                                <th>Email</th>
                                <th>No.WA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT id, nama_bengkel, email, nowa AS \"noWA\" FROM bengkel");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["nama_bengkel"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["noWA"] ?></td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateBengkel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
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
                    <h1>Artikel List</h1>
                    <a href="../admin/addArtikel.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Artikel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT * FROM artikel");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["judul"] ?>
                                    </td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateArtikel.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteArtikel.php<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="attendance-list">
                    <h1>Repair List</h1>
                    <a href="../admin/addRepair.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Judul Tutorial</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT * FROM repair");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["kategori"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["judul"] ?>
                                    </td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateRepair.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteRepair.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid-container-user">
                <div class="attendance-list">
                    <h1>Users</h1>
                    <a href="../login/user.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT * FROM users");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["user_name"] ?></td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateUser.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteUser.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="attendance-list">
                    <h1>Admin</h1>
                    <a href="../admin/addAdmin.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT * FROM admin");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateAdmin.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteAdmin.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="attendance-list">
                    <h1>Bengkel User</h1>
                    <a href="../login/bengkel.php" class="add">Add New</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>No.HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->query("SELECT id, username, nohp AS \"noHP\" FROM mechanic");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["username"] ?></td>
                                    <td><?php echo $row["noHP"] ?></td>
                                    <td>
                                        <a style="width: 0px;" href="../admin/updateMechanic.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a style="width: 0px;" href="../config/deleteMechanic.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>

</body>

</html>
