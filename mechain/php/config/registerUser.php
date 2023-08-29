<?php
session_start();
include "../conn_db/db_conn.php";

$user = [
    'name' => $_POST['name'],
    'user_name' => $_POST['username'],
    'password' => $_POST['password'],
];

$query = "SELECT * FROM users WHERE user_name = ? limit 1";
$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $user['user_name']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
    $_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
    header("Location: ../login/user.php");
    exit();
} else {
    $query = "INSERT INTO users (name, user_name, password) values  (?,?,?)";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('sss', $user['name'], $user['user_name'], $user['password']);
    $stmt->execute();
    $result = $stmt->get_result();
    var_dump($result);
    $_SESSION['message'] = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    header("Location: ../login/user.php");
    exit();
}
?>