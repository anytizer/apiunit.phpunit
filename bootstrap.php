<?php
$_SERVER["HTTP_USER_AGENT"] = "API Test Scripts";
$_SERVER["REQUEST_URI"] = "";

require_once("classes/class.relay.inc.php");

/**
 * Where is your API Server?
 */
#define("API_URL", "http://api.example.com/index.php/api");
define("API_URL", "http://localhost/");

#file_put_contents(dirname(__FILE__)."/curl.log", "");

/**
 * Only unit tests will set these valaues
 */
$_POST = array();
$_GET = array();

if(!function_exists("curl_init"))
{
	die("Curl not initialized.");
}

if(!function_exists("http_build_query"))
{
	die("http_build_query not initialized.");
}