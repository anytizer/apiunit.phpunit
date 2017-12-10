<?php
/**
 * Some API gateways need specific headers
 */
$_SERVER["HTTP_USER_AGENT"] = "API Unit Test";
$_SERVER["REQUEST_URI"] = "";

error_reporting(E_ALL|E_STRICT);

require_once("classes/backend\class.spl_include.inc.php");
spl_autoload_register(array(new \backend\spl_include("./classes"), "namespaced_inc_dot"));

$endpoints = new \endpoints\endpoints();

if(!function_exists("curl_init"))
{
	die("cURL library is not initialized.");
}

if(!function_exists("http_build_query"))
{
	die("http_build_query not initialized.");
}