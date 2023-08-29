<?php
include "../conn_db/db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `mechanic` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../users/admin.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>