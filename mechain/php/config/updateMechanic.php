<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $nama = htmlspecialchars($_POST['name']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $noHp = htmlspecialchars($_POST['noHP']);

  $sql = "UPDATE mechanic SET name = '$nama', username = '$username', email = '$email', password = '$password', noHP = '$noHp' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: ../users/admin.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>