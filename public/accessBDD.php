<?php
require_once("database.php");
function afficherTable() {
    try {
    global $bdd;
    openDatabase();
    $db = new PDO ('mysql:host=db;dbname=geoip;port=3306', DB_USER, DB_PWD);
    foreach ($db->query('SELECT * FROM ipv62location')as $row) {
        print_r($row);
    }
    
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    closeDatabase();
}

afficherTable();
?>