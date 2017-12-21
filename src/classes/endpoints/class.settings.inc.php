<?php
namespace endpoints;

/**
 * List of all available api endpoints
 * Class settings
 * @package endpoints
 */
abstract class settings
{
	public $ip = "ip.php";
	public $pingpong = "ping.php";
	public $datetime = "datetime.php";
	public $math = "math.php";
	public $algorithms = "algorithms.php";

	public $get = "get.php";
	public $post = "post.php";
	public $server = "server.php";
	public $protected_page = "protected-page.php";
	public $cookie = "cookie.php";

	public $upload_single = "upload-single.php";
	public $upload_multiple = "upload-multiple.php";
	public $upload_array = "upload-array.php";

	public $login = "login.php";
}
