<?php
require_once("inc.config.php");

/**
 * Required:
 * $_GET["id"]="present"
 * @see http://api.example.com:9090/tests/get.php
 * @see http://api.example.com:9090/tests/get.php?id=present
 * @see http://api.example.com:9090/tests/get.php?id=other
 */
$message = null;

if(!isset($_GET["id"]))
{
	$message = "missing";
}
else
{
	if($_GET["id"]=="present")
	{
		$message = "found";
	}
	else
	{
		$message = "invalid";
	}
}

echo $message;
