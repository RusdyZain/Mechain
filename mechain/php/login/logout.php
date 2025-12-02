<?php 
session_start();
require_once __DIR__ . '/../config/config.php';

session_unset();
session_destroy();

header("Location: " . base_path('index.php'));
exit();
?>
