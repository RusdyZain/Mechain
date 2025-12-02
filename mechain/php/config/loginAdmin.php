<?php
session_start();
include "../conn_db/db_conn.php";

function redirect_with_error(string $message): void
{
    header("Location: ../login/admin.php?error=" . urlencode($message));
    exit();
}

function validate(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function is_password_valid(string $password, string $storedHash): bool
{
    if (password_verify($password, $storedHash)) {
        return true;
    }

    if ($storedHash === $password) {
        return true;
    }

    return false;
}

if (!isset($_POST['email'], $_POST['password'])) {
    header("Location: ../login/admin.php");
    exit();
}

$email = validate($_POST['email']);
$pass = validate($_POST['password']);

if ($email === '') {
    redirect_with_error('Email is required');
}

if ($pass === '') {
    redirect_with_error('Password is required');
}

try {
    $stmt = $conn->prepare(
        'SELECT id, email, name, password FROM admin WHERE email = :email LIMIT 1'
    );
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $admin = $stmt->fetch();

    if (!$admin || !is_password_valid($pass, $admin['password'])) {
        redirect_with_error('Incorrect email or password');
    }

    $_SESSION['email'] = $admin['email'];
    $_SESSION['name'] = $admin['name'];
    $_SESSION['id'] = $admin['id'];

    header("Location: ../users/admin.php");
    exit();
} catch (PDOException $e) {
    error_log('Admin login failed: ' . $e->getMessage());
    redirect_with_error('Internal error, please try again later');
}
