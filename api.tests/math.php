<?php
require_once("inc.config.php");

$message = null;

if(isset($_GET["do"]))
{
	$a = (int)($_POST["a"]??0);
	$b = (int)($_POST["b"]??0);
	
	$result = null;
	switch($_GET["do"])
	{
		case "addition":
			$result = $a + $b;
			break;
		case "subtraction":
			$result = $a - $b;
			break;
		case "multiplication":
			$result = $a * $b;
			break;
		default:
			$result = "unknown method";
	}
	
	$message = $result;
}
else
{
	$message = "missing operation name";
}

echo $message;
