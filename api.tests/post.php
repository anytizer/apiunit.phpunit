<?php
require_once("inc.config.php");

/**
 * Required:
 * $_POST["id"]="present"
 * @see http://api.example.com:9090/tests/post.php
 * @see http://api.example.com:9090/tests/post.php?id=present
 * @see http://api.example.com:9090/tests/post.php?id=other
 */
$message = null;

if(!isset($_POST["id"]))
{
	$message = "missing";
}
else
{
	if($_POST["id"]=="present")
	{
		$message = "found";
	}
	else
	{
		$message = "invalid";
	}
}

echo $message;
#print_r($_POST);
