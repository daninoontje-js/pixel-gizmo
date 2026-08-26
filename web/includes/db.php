<?php

$host = "localhost";
$dbname = "jouw_database_naam";
$user = "jouw_gebruikersnaam";
$pass = "jouw_wachtwoord";

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