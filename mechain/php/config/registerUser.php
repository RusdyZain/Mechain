<?php
session_start();
include "../conn_db/db_conn.php";

function redirect_with_session_message(string $type, string $message): void
{
    $_SESSION[$type] = $message;
    header("Location: ../login/user.php");
    exit();
}

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($name === '' || $username === '' || $password === '') {
    redirect_with_session_message('error', 'Nama, username, dan password wajib diisi.');
}

try {
    $stmt = $conn->prepare('SELECT 1 FROM users WHERE user_name = :username LIMIT 1');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->fetchColumn()) {
        redirect_with_session_message('error', 'Username yang anda masukkan sudah ada di database.');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare(
        'INSERT INTO users (name, user_name, password) VALUES (:name, :username, :password)'
    );
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();

    redirect_with_session_message(
        'message',
        'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.'
    );
} catch (PDOException $e) {
    error_log('User registration failed: ' . $e->getMessage());
    redirect_with_session_message('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
}
?>
