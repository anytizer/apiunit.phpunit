<?php
namespace cases\api;

use connections\relay;
use \PHPUnit\Framework\TestCase;

/**
 * Strictly serving
 *
 * phpunit --filter StrictTest
 */
class StrictTest extends TestCase
{
	private $api_url = "http://192.168.0.100/angular/libraries/apiunit.phpunit/src/api.tests/strict.php";
	private $headers = array(
		"X_PROTECTION_CODE" => "000-000-0000",
	);
	
	public function testStrictTest()
	{
		$_GET = array(
			"order" => "height"
		);
		
		$_POST = array(
			"measure" => "yes"
		);

		$relay = new relay();
		$relay->headers($this->headers);
		$result = $relay->fetch($this->api_url);
		$response = json_decode($result, true);
		echo $result;
		#print_r($response);
		$this->assertEquals(9, count($response["data"]));
	}
	
	public function testStrictTestExtraGet()
	{
		$_GET = array(
			"order" => "height",
			"extra" => "parameter",
		);
		
		$_POST = array(
			"measure" => "yes"
		);

		$relay = new relay();
		$relay->headers($this->headers);
		$result = $relay->fetch($this->api_url);
		#echo $result;
		$response = json_decode($result, true);
		$this->assertNull($response);
	}
	
	public function testStrictTestExtraPost()
	{
		$_GET = array(
			"order" => "height",
		);
		
		$_POST = array(
			"measure" => "yes",
			"extra" => "parameter",
		);

		$relay = new relay();
		$relay->headers($this->headers);
		$result = $relay->fetch($this->api_url);
		#echo $result;
		$response = json_decode($result, true);
		$this->assertNull($response);
	}
	
	public function testStrictTestExtraBoth()
	{
		$_GET = array(
			"order" => "height",
			"extra" => "parameter",
		);
		
		$_POST = array(
			"measure" => "yes",
			"extra" => "parameter",
		);

		$relay = new relay();
		$relay->headers($this->headers);
		$result = $relay->fetch($this->api_url);
		#echo $result;
		$response = json_decode($result, true);
		$this->assertNull($response);
	}
}
