<?php
session_start();
include "../conn_db/db_conn.php";

$user = [
    'name' => $_POST['name'],
    'user_name' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'noHP' => $_POST['noHP'],
];

$query = "SELECT * FROM mechanic WHERE username = ? limit 1";
$stmt = $conn->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $user['user_name']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
    $_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
    header("Location: registerBengkel.php");
    exit();
} else {
    $query = "INSERT INTO mechanic (name, username, email, password, noHP) values  (?,?,?,?,?)";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('sssss', $user['name'], $user['user_name'], $user['email'], $user['password'], $user['noHP']);
    $stmt->execute();
    $result = $stmt->get_result();
    var_dump($result);
    $_SESSION['message'] = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    header("Location: ../login/bengkel.php");
    exit();
}
?>