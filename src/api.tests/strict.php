<?php
require_once("inc.config.php");

// only one GET parameter
// only one POST parameter
// sends out array
// no other unknown parameters to present
// one file must be uploaded
// special header must present
// specific user agent required
// /api.tests/strict.php?order=height

if(empty($_GET["order"]))
{
	throw new Exception("Order Selection not decided.");
}

if($_GET["order"]!="height")
{
	throw new Exception("This API needs order=height in GET.");
}

if(count($_GET)>1)
{
	throw new Exception("Too many unknown parameters in GET.");
}

if(empty($_POST["measure"]))
{
	throw new Exception("Measure parameter missing.");
}

if($_POST["measure"]!="yes")
{
	throw new Exception("Invalid measure value.");
}

if(count($_POST)>1)
{
	throw new Exception("Too many unknown parameters in POST.");
}

/**
 * Headers must be set carefully: x-protection-code
 */
if(empty($_SERVER["HTTP_X_PROTECTION_CODE"]))
{
	print_r($_SERVER);
	throw new Exception("Missing X Protection Code.");
}

if($_SERVER["HTTP_X_PROTECTION_CODE"]!="000-000-0000")
{
	print_r($_SERVER);
	throw new Exception("Invalid header: X Protection Code.");
}

$people = array(
	array("name" => "Name 1", "age" => "21", "height" => "5.1"),
	array("name" => "Name 2", "age" => "22", "height" => "5.2"),
	array("name" => "Name 3", "age" => "23", "height" => "5.3"),
	array("name" => "Name 4", "age" => "24", "height" => "5.4"),
	array("name" => "Name 5", "age" => "25", "height" => "5.5"),
	array("name" => "Name 6", "age" => "26", "height" => "5.6"),
	array("name" => "Name 7", "age" => "27", "height" => "5.7"),
	array("name" => "Name 8", "age" => "28", "height" => "5.8"),
	array("name" => "Name 9", "age" => "29", "height" => "5.9"),
);

$data = array(
	"access" => date("Y-m-d H:i:s"),
	"total" => count($people),
	"columns" => array(
		array("name" => "name", "text" => "Name", "width" => "500"),
		array("name" => "age", "text" => "Age", "width" => "50"),
		array("name" => "height", "text" => "Height", "width" => "50"),
	),
	"data" => $people,
);

echo json_encode($data);
