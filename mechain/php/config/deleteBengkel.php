<?php
include "../conn_db/db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `bengkel` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../admin/bengkel.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}