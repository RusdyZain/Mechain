<?php
include "../conn_db/db_conn.php";

$link = htmlspecialchars($_POST['link']);
$judul = htmlspecialchars($_POST['judul']);
$redaksi = htmlspecialchars($_POST['redaksi']);
$penerbit = htmlspecialchars($_POST['penerbit']);
$foto = $_FILES['foto']['name'];
$path = $_FILES['foto']['tmp_name'];
move_uploaded_file($path, '../../foto/'.$foto);

$sql = "INSERT INTO artikel VALUES ('', '$link', '$judul', '$redaksi', '$penerbit', '$foto')";

$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../admin/artikel.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}
