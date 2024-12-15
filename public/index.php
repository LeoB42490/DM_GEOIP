<?php
// Mesure du temps d'execution
$index_start = microtime(true);

if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environnement.", 1);
}

// Configuration dossiers
$sBasepath = $_SERVER['DOCUMENT_ROOT'].'/';
echo "Dossier base: {$sBasepath}\n<br>";
$sClassPath = $sBasepath . 'src/';
require_once($sClassPath . "autoload.php");


// Calcul du temps d'exécution
$index_end = microtime(true);
$temps_execution = ($index_end - $index_start) * 1000;
echo "Le temps d'exécution de la page est de : " . number_format($temps_execution, 3, '.', '') . " ms";

