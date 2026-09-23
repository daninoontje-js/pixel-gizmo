<?php

$host = "invullen";
$dbname = "invullen";
$user = "invullen";
$pass = "haha ik ga toch niet me wachtwoord hier zetten 😂"; 
// --- .GITIGNORE ---

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