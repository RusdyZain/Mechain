<?php
session_start();
include "../conn_db/db_conn.php";

$user = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];

$query = "SELECT * FROM admin WHERE email = ? limit 1";
$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $user['email']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
    $_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
    header("Location: registerAdmin.php");
    exit();
} else {
    $query = "INSERT INTO admin (name, email, password) values  (?,?,?)";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('sss', $user['name'], $user['email'], $user['password']);
    $stmt->execute();
    $result = $stmt->get_result();
    var_dump($result);
    $_SESSION['message'] = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    header("Location: loginAdmin.php");
    exit();
}
?>