<?php
include "../conn_db/db_conn.php";

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $nama = htmlspecialchars($_POST['name']);
  $username = htmlspecialchars($_POST['user_name']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "UPDATE users SET user_name = '$username', password = '$password', name = '$nama' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: ../users/admin.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>