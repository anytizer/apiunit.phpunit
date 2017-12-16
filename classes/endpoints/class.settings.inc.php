<?php
namespace endpoints;

/**
 * List of all available api endpoints
 * Class settings
 * @package endpoints
 */
abstract class settings
{
	public $ip = "tests/ip.php";
	public $pingpong = "tests/ping.php";
	public $datetime = "tests/datetime.php";
	public $math = "tests/math.php";

	public $get = "tests/get.php";
	public $post = "tests/post.php";
	public $server = "tests/server.php";
	public $cookie = "tests/cookie.php";

	public $upload_single = "tests/upload-single.php";
	public $upload_multiple = "tests/upload-multiple.php";
	public $upload_array = "tests/upload-array.php";

	public $login = "tests/login.php";
}
