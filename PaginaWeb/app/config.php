<?php
// Datos de conexión
$host = 'paginaweb-db-1'; // Nombre del servicio en docker-compose
$db = 'portfolio'; // Nombre de la base de datos
$user = 'portfolio_user'; // Usuario configurado en docker-compose
$pass = 'portfolio_password'; // Contraseña configurada en docker-compose

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
