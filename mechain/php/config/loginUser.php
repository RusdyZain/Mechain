<?php
session_start();
include "../conn_db/db_conn.php";

function redirect_with_error(string $message): void
{
    header("Location: ../login/user.php?error=" . urlencode($message));
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

if (!isset($_POST['uname'], $_POST['password'])) {
    header("Location: ../login/user.php");
    exit();
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if ($uname === '') {
    redirect_with_error('User Name is required');
}

if ($pass === '') {
    redirect_with_error('Password is required');
}

try {
    $stmt = $conn->prepare(
        'SELECT id, user_name, name, password FROM users WHERE user_name = :username LIMIT 1'
    );
    $stmt->bindParam(':username', $uname, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch();

    if (!$user || !is_password_valid($pass, $user['password'])) {
        redirect_with_error('Incorrect User name or password');
    }

    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['id'] = $user['id'];

    header("Location: ../users/user.php");
    exit();
} catch (PDOException $e) {
    error_log('Login failed: ' . $e->getMessage());
    redirect_with_error('Internal error, please try again later');
}
