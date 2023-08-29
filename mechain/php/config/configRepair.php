<?php
include "../conn_db/db_conn.php";

$kategori = htmlspecialchars($_POST['kategori']);
$judul = htmlspecialchars($_POST['judul']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$link = htmlspecialchars($_POST['link']);
$foto = $_FILES['foto']['name'];
$path = $_FILES['foto']['tmp_name'];
move_uploaded_file($path, '../../foto/'.$foto);

$sql = "INSERT INTO repair VALUES ('', '$kategori', '$judul', '$deskripsi', '$foto', '$link')";

$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../admin/repair.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}
