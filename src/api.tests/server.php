<?php
require_once("inc.config.php");

/**
 * Required:
 * X-Protection-Code: present
 * $_SERVER["HTTP_X_PROTECTION_CODE"]="present"
 * @see http://api.example.com:9090/tests/server.php
 */
$message = null;

if(!isset($_SERVER["HTTP_X_PROTECTION_CODE"]))
{
	$message = "missing";
}
else
{
	if($_SERVER["HTTP_X_PROTECTION_CODE"]=="present")
	{
		$message = "found";
	}
	else
	{
		$message = "invalid";
	}
}

echo $message;
#print_r($_SERVER);
# HTTP_X_PROTECTION_CODE
