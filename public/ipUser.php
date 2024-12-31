<?php
require_once("database.php");

//Fonction IPV4
function ip2Int($ip_address): int
{
    $parts = explode('.', $ip_address);
    if (count($parts) === 4) 
    {
        return ($parts[0] * 256 * 256 * 256) + ($parts[1] * 256 * 256) +
            ($parts[2] * 256) + $parts[3];
    }
    return 0;
}

function ipFrance($ip_int): bool
{
    $coutryCode = isFrenchIPV4($ip_int);
    return $coutryCode === "FR";
}

function ipFrance6($ip_int): bool
{
    $countryCode = isFrenchIPV6($ip_int);
    return $countryCode === "FR";
}
//-----------------------------------------------------------------------------
//Fonction qui récupère l'ip de l'utilisateur
function getUserIP()
{
    return $_SERVER['REMOTE_ADDR'];
}

//------------------------------------------------------------------------------
//Fonction IPV6

function getipnum($ip) 
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
    {
        // IPv4-mappée dans IPv6 (::ffff:x.x.x.x)
        if (preg_match('/^\:\:ffff\:\d+\.\d+\.\d+\.\d+$/i', $ip))
        {
                   return ip62long($ip);
        }
    else 
    {
        // Adresses IPv6 normales
        $ip = implode(':', str_split(unpack('H*0', inet_pton($ip))[0], 4));
        // Adresses 6to4 (2002::/16)
        if (substr($ip, 0, 4) == '2002')
        {
            return ip62long('::ffff:' . substr($ip, 5, 9));
        }
        // Adresses Teredo (2001:0::/32)
        elseif (substr($ip, 0, 9) == '2001:0000')
        {
            return ip62long('::ffff:' . long2ip(~hexdec(str_replace(':', '', substr($ip, -9)))));
        }
        // Adresses IPv4 incluses dans IPv6 (::ffff:x.x.x.x)
        elseif (substr($ip, 0, 30) == '0000:0000:0000:0000:0000:ffff:')
        {
            return ip62long('::ffff:' . long2ip(hexdec(str_replace(':', '', substr($ip, 30)))));
        }
        // Adresses IPv6 normales
        else
        {
            return ip62long($ip);
        }
    }
    }
    else
    {
        return 0;
    }
}
function ip62long($ipv6) 
{
    return (string) gmp_import(inet_pton($ipv6));
}
?>