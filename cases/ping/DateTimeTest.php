<?php
use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
	public function setup()
	{
		$_GET = array();
		$_POST = array();
	}

	public function testPingDateTime()
	{
		// Expects date/time output
		$relay = new relay();
		$result = $relay->fetch((new endpoints())->datetime);

		$this->assertEquals(strlen($result), strlen(date("Y-m-d H:i:s")));
	}

	public function testSimilarTimesInClientAndServer()
	{
		$datetime_local = date("Y-m-d H:i:s");

		$relay = new relay();
		$result = $relay->fetch((new endpoints())->datetime);

		$this->assertEquals(substr($result, 0, 10), substr($datetime_local, 0, 10));
	}
}
