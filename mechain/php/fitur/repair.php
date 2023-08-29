<?php
session_start();
include "../conn_db/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Repair</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/animate.css">

    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/styleRepair.css">
  </head>

  <body>
    <header id="header">
      <div class="bg-color">
        <nav class="nav navbar-default navbar-fixed-top">
          <div class="container">
            <div class="col-md-12">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                  <span class="fa fa-bars"></span>
                </button>
                <a href="index.html" class="navbar-brand">MECHAIN</a>
              </div>
              <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                <ul class="nav navbar-nav">
                  <li><a href="http://localhost/mechain/php/users/user.php">Home</a></li>
                  <li class="active"><a href="http://localhost/mechain/php/fitur/repair.php">Repair</a></li>
                  <li><a href="http://localhost/mechain/php/fitur/artikel.php">Article</a></li>
                  <li><a href="http://localhost/mechain/php/fitur/location.php">Location</a></li>
                  <li><a href="http://localhost/mechain/php/users/user.php#contact">Contact</a></li>
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

    <div class="main-container">
      <h2 style="color: white; padding-top: 80px;">All Problem Content</h2>
      <p style="color: white;">Pilihlah Tutorial yang Ingin Anda Cari!</p>
      <div class="filter-container">
        <div class="category-head">
          <ul>
            <div class="category-title"></div>
            <div class="category-title active" id="all">
              <li>All</li>
              <span><i class="fas fa-border-all"></i></span>
            </div>
            <div class="category-title" id="Sepeda">
              <li>Sepeda</li>
              <span><i class="fas fa-solid fa-bicycle"></i></span>
            </div>
            <div class="category-title" id="Motor">
              <li>Motor</li>
              <span><i class="fas fa-solid fa-motorcycle"></i></span>
            </div>
            <div class="category-title" id="Mobil">
              <li>Mobil</li>
              <span><i class="fas fa-duotone fa-car"></i></span>
            </div>
            <div class="category-title"></div>
          </ul>
        </div>

        <div class="posts-collect">
          <div class="posts-main-container">
            <?php
            $sql = "SELECT * FROM repair";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <!-- single post -->
              <div class="all <?php echo $row['kategori'] ?>">
                <div class="post-img">
                  <img src="../../foto/<?php echo $row['foto'] ?>" alt="post">
                  <span class="category-name"><?php echo $row['kategori'] ?></span>
                </div>

                <div class="post-content">
                  <h2><?php echo $row['judul'] ?></h2>
                  <p><?php echo $row['deskripsi'] ?></p>
                </div>
                <button type="button" class="read-btn"><a href="<?php echo $row['link'] ?>">View</a></button>
              </div>
              <!-- end of single post -->
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!--Script-->
    <script src="../../js/repair.js"></script>
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
  </body>

  </html>

<?php
} else {
  header("Location: index.php");
  exit();
}
?>