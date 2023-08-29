<?php
include "../conn_db/db_conn.php";

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

$sql = "INSERT INTO contact VALUES ('', '$name', '$email', '$subject', '$message')";

$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: http://localhost/mechain/index.html");
} else {
  echo "Failed: " . mysqli_error($conn);
}
