<?php
$host = '46.4.98.184';
$port = 3306;
$db   = 'omnipowe_solutechdb';
$user = 'omnipowe_nelson';
$pass = 'Solutech123456';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    echo "✅ Connection successful!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
