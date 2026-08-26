<?php

$host = "localhost";
$dbname = "jouw_database_naam";
$user = "jouw_gebruikersnaam";
$pass = "jouw_wachtwoord";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Automatische controle voor de photo kolom op de nieuwe tabel
    $check = $conn->prepare("SELECT COUNT(*) FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'markt_ads' AND COLUMN_NAME = 'photo'");
    $check->execute();

    if($check->fetchColumn() == 0){
        $conn->exec("ALTER TABLE markt_ads ADD COLUMN photo MEDIUMBLOB DEFAULT NULL");
    }
} catch(PDOException $e) {
    echo "Database fout: " . $e->getMessage();
}