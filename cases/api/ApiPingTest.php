<?php
/**
 * Define your own Test Cases
 */
class ApiPingTest extends PHPUnit\Framework\TestCase
{
	private $relay = null;

	public function setup()
	{
		$this->api_url = API_URL;

		$_GET = array();
		$_POST = array();
		
		$this->relay = new relay();
	}

	/**
	 * Sample PING Test
	 */
	public function testPingToApiServer()
	{
		$something = "something";
		$date = date("YmdHis");
		$random = mt_rand(1000, 9999);
		
		$_GET = array(
			"something" => $something,
			"ping" => $date
		);
		
		$_POST = array(
			"data" => $random
		);

		#$result = $this->relay->fetch($this->api_url."/ping");
		$result = $this->relay->fetch($this->api_url);
		$this->assertEquals($result, "{$something}|{$date}:{$random}", "PING failure to API Server");
	}
}
