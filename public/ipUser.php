<?php
require_once("database.php");

function ip2Int($ip_address): int
{
    $parts = explode('.', $ip_address);
    if (count($parts) === 4) {
        return ($parts[0] * 256 * 256 * 256) + ($parts[1] * 256 * 256) +
            ($parts[2] * 256) + $parts[3];
    }
    return 0;
}

function ipFrance($ip_int): bool
{
    $coutryCode = isFrench($ip_int);
    return $coutryCode === "FR";
}

//Fonction qui réucpère ip du user
function getUserIP() 
{
    /* Proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }*/
    return $_SERVER['REMOTE_ADDR'];
}
?>