<?php

require_once __DIR__ . '/../config/config.php';

try {
    $dsn = sprintf(
        '%s:host=%s;port=%s;dbname=%s',
        DB_DRIVER,
        DB_HOST,
        DB_PORT,
        DB_NAME
    );

    $conn = new PDO(
        $dsn,
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    // Jangan menampilkan detail error ke user, simpan ke log saja.
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('Internal Server Error');
}