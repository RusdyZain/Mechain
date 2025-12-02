<?php

require_once __DIR__ . '/mechain/php/conn_db/db_conn.php';

$schemaPath = __DIR__ . '/mechain/db/schema_pg.sql';

if (!is_readable($schemaPath)) {
    fwrite(STDERR, "Schema file not found: {$schemaPath}\n");
    exit(1);
}

$schemaSql = file_get_contents($schemaPath);

if ($schemaSql === false) {
    fwrite(STDERR, "Failed to read schema file.\n");
    exit(1);
}

try {
    $conn->exec($schemaSql);
    fwrite(STDOUT, "Database migrations executed successfully.\n");
} catch (PDOException $e) {
    fwrite(STDERR, "Failed to execute migrations: " . $e->getMessage() . "\n");
    exit(1);
}

