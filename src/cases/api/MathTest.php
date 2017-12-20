<?php
namespace cases\api;

use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->math;
	}

	public function testAddition()
	{
		$_GET = array(
			"do" => "addition",
		);

		$_POST = array(
			"a" => 5,
			"b" => 17,
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("22", $result);
	}

	public function testSubtraction()
	{
		$_GET = array(
			"do" => "subtraction",
		);

		$_POST = array(
			"a" => 17,
			"b" => 5,
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("12", $result);
	}

	public function testMultiplication()
	{
		$_GET = array(
			"do" => "multiplication",
		);

		$_POST = array(
			"a" => 17,
			"b" => 5,
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("85", $result);
	}
}
