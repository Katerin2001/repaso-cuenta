<?php
$hostname = "localhost";
$dbname = "repaso1";
$password = "";
$user = "root";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $password);
    // Establecer el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
