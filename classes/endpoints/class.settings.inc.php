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

	public $get = "tests/get.php";
	public $post = "tests/post.php";
	public $server = "tests/server.php";
	public $cookie = "tests/cookie.php";
}

// eg: http://api.example.com:9090/tests/ping.php