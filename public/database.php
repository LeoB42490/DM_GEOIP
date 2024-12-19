<?php
require_once("config.php");

function openDatabase()
{
    global $bdd;
    $db_access = sprintf('mysql:host=%s;dbname=%s;port=3306charset=utf8', DB_HOST, DB_NAME);
    $bdd = new PDO($db_access, DB_USER, DB_PWD);
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}

function closeDatabase()
{
    global $bdd;
    $bdd = null;
}

function isFrench($ip_addressINT)
{
    global $bdd;
    $sRequete = 'SELECT country_code FROM ip2location WHERE ip_from <= :ip_addressINT AND ip_to >= :ip_addressINT';
    $stmt = $bdd->prepare($sRequete);
    // Bind the value for the placeholder
    $stmt->bindValue(':ip_addressINT', $ip_addressINT, PDO::PARAM_INT);
    
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $result['country_code'] ?? null;
}
?>