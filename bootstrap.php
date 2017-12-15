<?php
#namespace apiunit;

/**
 * Some API gateways need specific headers
 */
$_SERVER["HTTP_USER_AGENT"] = "API Unit Test";
$_SERVER["REQUEST_URI"] = "";

error_reporting(E_ALL|E_STRICT);

require_once(dirname(__FILE__)."/classes/backend/class.spl_include.inc.php");
spl_autoload_register(array(new \backend\spl_include(dirname(__FILE__)."/classes"), "namespaced_inc_dot"));

/**
 * @todo Make endpoints specific to the API groupset being tested.
 */
$endpoints = new endpoints\endpoints();

if(!function_exists("curl_init"))
{
	die("cURL library is not initialized.");
}

if(!function_exists("http_build_query"))
{
	die("http_build_query not initialized.");
}

/**
 * The cURL application will set its own headers
 */
stream_context_set_default(
	array(
		"http" => array(
			"method" => "HEAD"
		)
	)
);

/**
 * Often XDebug is NOT necessary.
 * Disable the code below when using xDebug with IDEs like PHPStorm
 * @see https://xdebug.org/docs/all_functions
 */
if(function_exists("xdebug_disable")) {
	xdebug_disable();
}