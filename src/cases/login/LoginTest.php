<?php
namespace cases\login;

use \connections\relay;
use PHPUnit\Framework\TestCase;

/**
 * Class LoginTest
 * @package cases\login
 *
 * phpunit --filter LoginTest
 */
class LoginTest extends TestCase
{
	public function testLoginFailure()
	{
		$_POST = array(
			"username" => "username",
			"password" => "password-bad",
		);

		$relay = new relay();
		$result = $relay->fetch((new \endpoints\endpoints())->login);
		#echo $result;

		// expect cookie in set request
		$this->assertFalse(stripos($result, "Success:"));
		$this->assertTrue(stripos($result, "Error:")!==false);
	}

	public function testLoginSuccessful()
	{
		$_POST = array(
			"username" => "username",
			"password" => "password",
		);

		$relay = new relay();
		$result = $relay->fetch((new \endpoints\endpoints())->login);
		#echo $result;

		// expect cookie in set request
		$this->assertFalse(stripos($result, "Error:"));
		$this->assertTrue(stripos($result, "Success:")!==false);
		$this->assertTrue(stripos($result, "Set Cookie")!==false);
	}

	public function testLoginWithCookieData()
	{
		$this->markTestIncomplete();
	}
}
