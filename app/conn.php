<?php
require_once __DIR__ . '/config.php';

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4",
    $dbuser,
    $dbpass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);