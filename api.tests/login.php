<?php
require_once("inc.config.php");

if(isset($_POST["username"]) && isset($_POST["password"]))
{
	// set cookie data
	// echo "Logging in";
	
	if($_POST["username"]=="username" && $_POST["password"]=="password")
	{
		echo "Success: Set Cookie data: ", md5(microtime());
	}
	else
	{
		echo "Error: Invalid login attempt.";
	}
}
else
{
	echo "Error: Not a login data.";
}
