<?php
require_once("ipUser.php");
require_once("database.php");

// Récupération de l'adresse IP
$user_ip = getUserIP();

if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
{
    $user_Ip_INT = convertIPV4($user_ip);
    openDatabase();
    $estFrançais = getIPFrance($user_Ip_INT);
    closeDatabase();
    if ($estFrançais)
    {
        include './home.php';
    } 
    http_response_code(403);
    die();
}

if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
{
    $user_Ip_INT = convertIPV6($user_ip);
    openDatabase();
    $estFrançais = getIPFrance6($user_Ip_INT);
    closeDatabase();
    if ($estFrançais)
    {
        include './home.php';
    } 
    http_response_code(403);
    die();
}
?>
