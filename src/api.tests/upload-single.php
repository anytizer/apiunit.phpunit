<?php
require_once("inc.config.php");

// http://jsonapi.org
header("Content-Type: application/json");
// header("Content-Type: application/vnd.api+json");

#print_r($_FILES);
#echo "Uploaded?";

/**
Array
(
    [profile] => Array
        (
            [name] => profile.png
            [type] => image/png
            [tmp_name] => D:\xampp\tmp\php1F82.tmp
            [error] => 0
            [size] => 1543
        )

)
*/
$message = array("message" => "File was not received on server.");
if(isset($_FILES["profile"]))
{
	$message = $_FILES["profile"];
}

// in results, look for
// error: 0
// size: as original
// tmp_name: to exist
echo json_encode($message);
