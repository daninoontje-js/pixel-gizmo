<?php

$host = "localhost";
$dbname = "pixelgizmo";
$user = "root";
$pass = "dit is een test om te kijken of gitignore werkt";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connectie mislukt: " . $e->getMessage());
}