<?php
require_once("database.php");
function afficherTable() {
    try {
    // Chaîne de connexion PDO
    global $bdd;
    openDatabase();
    $db = new PDO ('mysql:host=db;dbname=geoip;port=3306', DB_USER, DB_PWD);
    foreach ($db->query('SELECT * FROM ipv62location')as $row) {
        print_r($row);
    }
    
    } catch (PDOException $e) {
        // En cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
    closeDatabase();
}

// Exemple d'utilisation
afficherTable(); // Remplacez par le nom réel de la table
?>