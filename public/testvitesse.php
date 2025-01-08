<?php
require_once("ipUser.php");
require_once("database.php");

$index_start = microtime(true);
$user_ip = getUserIP();
// getUserIP()
// ip française : "192.166.204.0" // "0000:0000:0000:0000:0000:ffff:253c:b800"
// ip non française : "192.166.247.0" // "::ffff:0:100"
$user_Ip_INT = convertIPV4($user_ip);
openDatabase();
$estFrançais = getIPFrance($user_Ip_INT);
closeDatabase();
$index_end = microtime(true);
$temps_execution = ($index_end - $index_start) * 1000;
echo "Le temps d'exécution de la page est de : " . number_format($temps_execution, 3, '.', '') . " ms\n";
?>