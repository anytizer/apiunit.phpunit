<?php
namespace cases\post;

use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->post;
	}

	public function testPostMustBePresent1()
	{
		$_POST = array(
			"id" => "present",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("found", $result);
	}

	public function testPostMustBePresent2()
	{
		$_POST = array(
			"id" => "other",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("invalid", $result);
	}

	public function testPostMustBePresent3()
	{
		$_POST = array(
			"other" => "something",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("missing", $result);
	}
}
