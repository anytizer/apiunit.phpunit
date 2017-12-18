<?php
require_once("inc.config.php");

$ip_addresses = array();

$ip_addresses[] = $_SERVER["REMOTE_ADDR"]??"";
#$ip_addresses[] = $_SERVER["HTTP_CLIENT_IP"]??"";
#$ip_addresses[] = $_SERVER["HTTP_X_FORWARDED_FOR"]??"";
#$ip_addresses[] = $_SERVER["HTTP_X_CLUSTER_CLIENT_IP"]??"";
#$ip_addresses[] = $_SERVER["HTTP_FORWARDED_FOR"]??"";

$ip_addresses = array_filter($ip_addresses);
$ip_addresses = array_unique($ip_addresses);

echo implode(";", $ip_addresses);
