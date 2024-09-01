<?php
// db.php
$host = 'localhost';
$dbname = 'acluser1';
$username = 'root'; // Cambiar si tu usuario es diferente
$password = ''; // Cambiar si tu contraseña es diferente

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
