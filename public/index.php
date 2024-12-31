<?php
require_once("ipUser.php");
require_once("database.php");

// Récupération de l'adresse IP
$user_ip = getUserIP();

if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
{
    $user_Ip_INT = ip2Int($user_ip);
    openDatabase();
    $estFrançais = ipFrance($user_Ip_INT);
    closeDatabase();
    if ($estFrançais)
    {
        header("Location: home.php");
    } else
    {
        header("HTTP/1.0 403 Forbidden");
        die();
    }
} elseif (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
{
    $user_Ip_INT = getipnum($user_ip);
    openDatabase();
    $estFrançais = ipFrance6($user_Ip_INT);
    closeDatabase();
    if ($estFrançais)
    {
        header("Location: home.php");
    } else
    {
        header("HTTP/1.0 403 Forbidden");
        die();
    }
}

?>
