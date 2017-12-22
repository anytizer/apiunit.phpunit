<?php
namespace cases\api;

use connections\relay;
use \PHPUnit\Framework\TestCase;

/**
 * Generate and Use tokens before actual API is being accessed
 * phpunit --filter TokenTest
 */
class TokenTest extends TestCase
{
	private $relay = null;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$result = $relay->fetch("http://192.168.0.100/angular/libraries/apiunit.phpunit/src/api.tests/strict.php");
		$this->assertEquals("22", $result);
	}

	public function testTokenCreate()
	{
		$this->markTestIncomplete();
	}
	
	public function testTokenValidation()
	{
		$this->markTestIncomplete();
	}
}
