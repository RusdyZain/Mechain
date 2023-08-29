<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $nama = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "UPDATE admin SET name = '$nama',email = '$email',password = '$password'  WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: ../users/admin.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
