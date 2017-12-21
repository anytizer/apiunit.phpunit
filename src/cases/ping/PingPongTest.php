<?php
namespace cases\ping;

use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

/**
 * Class PingPongTest
 * @package cases\ping
 *
 * phpunit --filter PingPongTest
 */
class PingPongTest extends TestCase
{
	public function setup()
	{
		$_GET = array();
		$_POST = array();
	}

	public function testPingPong()
	{
		$relay = new relay();
		$result = $relay->fetch((new endpoints())->pingpong);

		$this->assertEquals("pong", $result);
	}

	/**
	 * Sample PING Test
	 */
	/*
	public function testPingToApiServer()
	{
		$something = "something";
		$date = date("YmdHis");
		$random = mt_rand(1000, 9999);

		$_GET = array(
			"something" => $something,
			"ping" => $date
		);

		$_POST = array(
			"data" => $random
		);

		#$result = $this->relay->fetch($this->api_url."/ping");
		$result = $this->relay->fetch($this->api_url);
		$this->assertEquals($result, "{$something}|{$date}:{$random}", "PING failure to API Server");
	}
	*/
}
