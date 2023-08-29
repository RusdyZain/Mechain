<?php
include "../conn_db/db_conn.php";

$nama_bengkel = htmlspecialchars($_POST['nama_bengkel']);
$email = htmlspecialchars($_POST['email']);
$noWA = htmlspecialchars($_POST['noWA']);
$servis = implode(', ',($_POST['servis']));
$alamat_bengkel = htmlspecialchars($_POST['alamat_bengkel']);
$link_maps = htmlspecialchars($_POST['link_maps']);
$waktu_operasi = htmlspecialchars($_POST['waktu_operasi']);
$hari_operasi = htmlspecialchars($_POST['hari_operasi']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);
$foto = $_FILES['foto']['name'];
$path = $_FILES['foto']['tmp_name'];
move_uploaded_file($path, '../../foto/'.$foto);

$queryBengkel = "INSERT INTO bengkel VALUES ('','$nama_bengkel','$email','$noWA','$servis','$alamat_bengkel','$link_maps','$waktu_operasi','$hari_operasi','$deskripsi','$foto')";

$result = mysqli_query($conn, $queryBengkel);

if ($result) {
    header("Location:../users/mechanic.php");
  } else {
    echo "Failed: " .mysqli_error($conn);
  }
