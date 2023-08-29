<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $nama_bengkel = htmlspecialchars($_POST['nama_bengkel']);
  $email = htmlspecialchars($_POST['email']);
  $noWA = htmlspecialchars($_POST['noWA']);
  $servis = implode(', ', $_POST['servis']);
  $alamat_bengkel = htmlspecialchars($_POST['alamat_bengkel']);
  $link_maps = htmlspecialchars($_POST['link_maps']);
  $waktu_operasi = htmlspecialchars($_POST['waktu_operasi']);
  $hari_operasi = htmlspecialchars($_POST['hari_operasi']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);

  $sql = "UPDATE bengkel SET nama_bengkel = '$nama_bengkel',email = '$email',noWA = '$noWA',servis='$servis',alamat_bengkel='$alamat_bengkel',link_maps='$link_maps',waktu_operasi='$waktu_operasi',hari_operasi='$hari_operasi',deskripsi = '$deskripsi' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: ../admin/bengkel.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>