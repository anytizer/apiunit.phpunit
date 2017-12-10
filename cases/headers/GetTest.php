<?php
use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->get;
	}

	public function testGetMustBePresent1()
	{
		$_GET = array(
			"id" => "present",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("found", $result);
	}

	public function testGetMustBePresent2()
	{
		$_GET = array(
			"id" => "other",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("invalid", $result);
	}

	public function testGetMustBePresent3()
	{
		$_GET = array(
			"other" => "something",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("missing", $result);
	}
}
