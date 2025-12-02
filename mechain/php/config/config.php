<?php

// Database configuration for PostgreSQL using environment variables / .env file.

// Muat file .env di root folder aplikasi (folder "mechain") bila ada.
$rootDir = dirname(__DIR__, 2); // .../mechain
$envFile = $rootDir . DIRECTORY_SEPARATOR . '.env';

if (is_readable($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) {
            continue;
        }
        $key = trim($parts[0]);
        $value = trim($parts[1]);
        if ($key === '') {
            continue;
        }
        if (!array_key_exists($key, $_ENV)) {
            $_ENV[$key] = $value;
        }
        if (getenv($key) === false) {
            putenv($key . '=' . $value);
        }
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }
}

// Driver database yang digunakan aplikasi (default: pgsql).
define('DB_DRIVER', env('DB_DRIVER', 'pgsql'));

// Host dan port server database.
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_PORT', env('DB_PORT', '5432'));

// Nama database dan kredensial user.
define('DB_NAME', env('DB_NAME', 'mechain_db'));
define('DB_USER', env('DB_USER', 'postgres'));
define('DB_PASSWORD', env('DB_PASSWORD', ''));

// Base path aplikasi (mis. "/mechain" bila disajikan dari subfolder).
$rawBasePath = env('APP_BASE_PATH', '');
$rawBasePath = trim($rawBasePath);
if ($rawBasePath === '' || $rawBasePath === '/') {
    $normalizedBasePath = '';
} else {
    $normalizedBasePath = '/' . trim($rawBasePath, '/');
}
define('APP_BASE_PATH', $normalizedBasePath);

if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        $base = APP_BASE_PATH;
        if ($base === '') {
            $prefix = '';
        } else {
            $prefix = $base;
        }

        if ($path === '') {
            return $prefix === '' ? '/' : $prefix . '/';
        }

        return ($prefix === '' ? '/' : $prefix . '/') . ltrim($path, '/');
    }
}
