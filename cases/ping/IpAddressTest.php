<?php
use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

/**
 * Define your own Test Cases
 */
class IpAddressTest extends TestCase
{
	public function setup()
	{
		$_GET = array();
		$_POST = array();
	}

	public function testIpAddress()
	{
		$endpoints = new endpoints();

		// Expects local IP Address
		$relay = new relay();
		$result = $relay->fetch($endpoints->ip);

		$possible_ips = array(
			"192.168.0.100",
			"127.0.0.1",
		);

		$this->assertTrue(in_array($result, $possible_ips));
	}
}
