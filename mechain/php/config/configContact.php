<?php
include "../conn_db/db_conn.php";

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

try {
  $stmt = $conn->prepare(
    "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)"
  );
  $stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':subject' => $subject,
    ':message' => $message,
  ]);

  header("Location: " . base_path('index.php'));
  exit();
} catch (PDOException $e) {
  error_log('Failed to save contact form: ' . $e->getMessage());
  http_response_code(500);
  echo "Failed to submit contact form.";
}
