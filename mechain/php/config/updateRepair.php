<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $kategori = htmlspecialchars($_POST['kategori']);
  $judul = htmlspecialchars($_POST['judul']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);
  $link = htmlspecialchars($_POST['link']);

  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = "../path/foto/" . $foto;
    
    if (move_uploaded_file($foto_tmp, $foto_path)) {

      $sql = "UPDATE repair SET kategori = '$kategori',judul = '$judul',deskripsi= '$deskripsi',foto='$foto',link='$link' WHERE id = $id";     
      $result = mysqli_query($conn, $sql);

      if ($result) {
        header("Location: ../admin/repair.php");
      } else {
        echo "Failed: " . mysqli_error($conn);
      }
    } else {
      echo "Failed to upload photo.";
    }
  } else {
    // Update entri dalam database tanpa foto
    $sql = "UPDATE repair SET kategori = '$kategori',judul = '$judul',deskripsi= '$deskripsi',link='$link' WHERE id = $id";    
    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: ../admin/repair.php");
    } else {
      echo "Failed: " . mysqli_error($conn);
    }
  }
}
