<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $judul = htmlspecialchars($_POST['judul']);
  $link = htmlspecialchars($_POST['link']);
  $penerbit = htmlspecialchars($_POST['penerbit']);
  $redaksi = htmlspecialchars($_POST['redaksi']);

  if (isset($_FILES['foto'])) {
    $foto = $_FILES['foto']['name'];
    $path = $_FILES['foto']['tmp_name'];

    if (move_uploaded_file($path, '../../foto/' . $foto)) {

      $sql = "UPDATE artikel SET link = '$link',judul = '$judul',redaksi= '$redaksi',penerbit='$penerbit',foto='$foto' WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        header("Location: ../admin/artikel.php");
      } else {
        echo "Failed: " . mysqli_error($conn);
      }
    } else {
      echo "Failed to upload photo.";
    }
  } else {
    // Update entri dalam database tanpa foto
    $sql = "UPDATE artikel SET link = '$link',judul = '$judul',redaksi= '$redaksi',penerbit='$penerbit' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: ../admin/artikel.php");
    } else {
      echo "Failed: " . mysqli_error($conn);
    }
  }
}
