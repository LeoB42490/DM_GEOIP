<?php
require_once("ipUser.php");
require_once("database.php");
$index_start = microtime(true);
$user_ip = getUserIP();
// getUserIP()
// ip française : 192.166.204.0
// ip non française : 192.166.247.0
$user_Ip_INT = ip2Int($user_ip);
openDatabase();
$estFrançais = ipFrance($user_Ip_INT);
closeDatabase();
$index_end = microtime(true);
$temps_execution = ($index_end - $index_start) * 1000;
echo "Le temps d'exécution de la page est de : " . number_format($temps_execution, 3, '.', '') . " ms\n";
?>