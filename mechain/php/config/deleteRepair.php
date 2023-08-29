<?php
include "../conn_db/db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `repair` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../admin/repair.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}