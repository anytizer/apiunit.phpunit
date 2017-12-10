<?php
/**
 * Some API gateways need specific headers
 */
$_SERVER["HTTP_USER_AGENT"] = "API Test Scripts";
$_SERVER["REQUEST_URI"] = "";

error_reporting(E_ALL|E_STRICT);

require_once("classes/endpoints/class.settings.inc.php");
require_once("classes/endpoints/class.endpoints.inc.php");
require_once("classes/connections/class.relay.inc.php");
require_once("classes/others/class.mimer.inc.php");
require_once("classes/others/class.ReadyToUpload.inc.php");

$endpoints = new \endpoints\endpoints();
#print_r($endpoints);
#echo "DateTime API is: ", $endpoints->datetime;
#die(" Done!");

/**
 * Where is your API Server?
 */
#define("API_URL", "http://api.example.com/index.php/api");
define("API_URL", "http://localhost/");

#file_put_contents(dirname(__FILE__)."/curl.log", "");

/**
 * Only unit tests will set these values
 */
$_POST = array();
$_GET = array();

if(!function_exists("curl_init"))
{
	die("cURL library is not initialized.");
}

if(!function_exists("http_build_query"))
{
	die("http_build_query not initialized.");
}