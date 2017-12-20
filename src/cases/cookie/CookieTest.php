<?php
namespace cases\cookie;

use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class CookieTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->post;
	}

	public function testCookieMustBePresent1()
	{
		$this->markTestIncomplete(); return;

		$cookie = array(
			"id" => "present",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("found", $result);
	}

	public function testCookieMustBePresent2()
	{
		$this->markTestIncomplete(); return;

		$cookie = array(
			"id" => "other",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("invalid", $result);
	}

	public function testCookieMustBePresent3()
	{
		$this->markTestIncomplete(); return;

		$cookie = array(
			"other" => "something",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("missing", $result);
	}
}
