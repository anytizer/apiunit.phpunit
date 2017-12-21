<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class FileMultipleTest
 * @package cases\file
 *
 * phpunit --filter FileMultipleTest
 */
class FileMultipleTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadMultipleFile()
	{
		$ru = new ReadyToUpload();

		$_POST = array(
			"profile1" => $ru->collect("../resources/acs.png"),
			"profile2" => $ru->collect("../resources/reports.pdf"),
		);

		$relay = new relay();
		$result = $relay->fetch((new endpoints())->upload_multiple);

		$response = json_decode($result, true);
		//print_r($response);

		$this->assertEquals(filesize("../resources/acs.png"), $response["profile1"]["size"]);
		$this->assertEquals(filesize("../resources/reports.pdf"), $response["profile2"]["size"]);
	}

	public function testUploadFilesArray()
	{
		$ru = new ReadyToUpload();

		/**
		 * Indices are fully defined as string
		 * @see https://stackoverflow.com/questions/44474192/upload-multiple-files-with-curl
		 */
		$_POST = array(
			"profiles[0]" => $ru->collect("../resources/acs.png"),
			"profiles[1]" => $ru->collect("../resources/reports.pdf"),
		);

		$relay = new relay();
		$result = $relay->fetch((new endpoints())->upload_array);

		$response = json_decode($result, true);
		#print_r($response);

		$this->assertEquals(filesize("../resources/acs.png"), $response["profiles"]["size"][0]);
		$this->assertEquals(filesize("../resources/reports.pdf"), $response["profiles"]["size"][1]);
	}
}
