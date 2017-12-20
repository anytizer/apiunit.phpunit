<?php
namespace cases\api;

use connections\relay;
use \PHPUnit\Framework\TestCase;

/**
 * Generate and Use tokens before actual API is being accessed
 */
class TokenTest extends TestCase
{
	private $relay = null;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->relay = new relay();
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
