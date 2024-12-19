<?php
require_once("ipUser.php");
require_once("database.php");
// Mesure du temps d'execution
$index_start = microtime(true);

/* Vérification de l'environnement d'exécution
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environment.", 1);
}*/
// Configuration des dossiers
$sBasepath = $_SERVER['DOCUMENT_ROOT'] . '/';
//echo "Dossier base: {$sBasepath}\n<br>";
$sClassPath = $sBasepath . 'src/';

// Inclusion des fichiers nécessaires
require_once($sClassPath . "autoload.php");

// Récupération de l'adresse IP
$user_ip = getUserIP(); // Mettre a la place IP japonais ou fr pour teste
$user_Ip_INT = ip2Int($user_ip);

openDatabase();
$estFrançais = ipFrance($user_Ip_INT);
closeDatabase();

if ($estFrançais) {
    header("Location: home.php");
} else {
    header("HTTP/1.1 403 Forbidden");
    include("code403.php");
}

// Calcul du temps d'exécution
//$index_end = microtime(true);
//$temps_execution = ($index_end - $index_start) * 1000;
//echo "Le temps d'exécution de la page est de : " . number_format($temps_execution, 3, '.', '') . " ms\n";
?>
