<?php
use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class HeadersTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->server;
	}

	public function testProtectionCodeMustBePresent1()
	{
		$headers = array(
			"X-Protection-Code" => "present",
		);

		$relay = new relay();
		$relay->headers($headers);

		$result = $relay->fetch($this->api_url);

		$this->assertEquals("found", $result);
	}

	public function testProtectionCodeBePresent2()
	{
		$headers = array(
			"X-Protection-Code" => "other",
		);

		$relay = new relay();
		$relay->headers($headers);

		$result = $relay->fetch($this->api_url);

		$this->assertEquals("invalid", $result);
	}

	public function testProtectionCodeMustBePresent3()
	{
		$headers = array(
			"X-Protection-Code-Missing" => "something",
		);

		$relay = new relay();
		$relay->headers($headers);

		$result = $relay->fetch($this->api_url);

		$this->assertEquals("missing", $result);
	}
}
