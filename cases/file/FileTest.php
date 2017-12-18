<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testErrorUploadingTooBigFile()
	{
		// max file size limited
		$this->markTestIncomplete();
	}

	public function testUploadSingleFileLegacyMethod()
	{
		// @filename method
		$filename = 'resources/acs.png';

		// uploads, works
		$ch = curl_init($this->api_url);
		$cfile = new CURLFile($filename,'image/png','profile.png');
		$data = array('profile' => $cfile);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$result = curl_exec($ch);
		curl_close($ch);

		// echo $result;

		$response = json_decode($result, true);
		$this->assertArrayHasKey("tmp_name", $response);
		$this->assertEquals(filesize($filename), $response["size"]);
	}

	public function testUploadSingleFile()
	{
		// Do not use @
		// CURLOPT_SAFE_UPLOAD
		// http://php.net/manual/en/function.curl-setopt.php
		// http://php.net/manual/en/class.curlfile.php
		// http://php.net/manual/en/curlfile.construct.php
		// https://wiki.php.net/rfc/curl-file-upload
		// http://php.net/curl_file_create -- procedural to CurlFile

		$filename = "resources/acs.png";

		$mimer = new \others\mimer();
		$mime = $mimer->get_mime($filename);

		$ru = new ReadyToUpload();

		$_POST = array(
			// @todo Further enhance this script as a single API to mimer, uploader
			"profile" => new CURLFile($filename, $mime, basename($filename)),
			//"profile" => $ru->collect($filename),
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$response = json_decode($result, true);
		#print_r($response);

		$this->assertTrue(is_array($response));
		$this->assertArrayHasKey("tmp_name", $response);

		//$this->markTestIncomplete();
	}

	public function testUploadMultipleFile()
	{
		$ru = new ReadyToUpload();

		$_POST = array(
			"profile1" => $ru->collect("resources/acs.png"),
			"profile2" => $ru->collect("resources/reports.pdf"),
		);

		$relay = new relay();
		$result = $relay->fetch((new endpoints())->upload_multiple);

		$response = json_decode($result, true);
		//print_r($response);

		$this->assertEquals(filesize("resources/acs.png"), $response["profile1"]["size"]);
		$this->assertEquals(filesize("resources/reports.pdf"), $response["profile2"]["size"]);
	}

	public function testUploadFilesArray()
	{
		$ru = new ReadyToUpload();

		/**
		 * Indices are fully defined as string
		 * @see https://stackoverflow.com/questions/44474192/upload-multiple-files-with-curl
		 */
		$_POST = array(
			"profiles[0]" => $ru->collect("resources/acs.png"),
			"profiles[1]" => $ru->collect("resources/reports.pdf"),
		);

		$relay = new relay();
		$result = $relay->fetch((new endpoints())->upload_array);

		$response = json_decode($result, true);
		#print_r($response);

		$this->assertEquals(filesize("resources/acs.png"), $response["profiles"]["size"][0]);
		$this->assertEquals(filesize("resources/reports.pdf"), $response["profiles"]["size"][1]);
	}

	public function testUploadFileWithPostedData()
	{
		$ru = new ReadyToUpload();

		$_POST = array(
			"profile" => $ru->collect("resources/acs.png"),
			"reports" => $ru->collect("resources/reports.pdf"),
		);

		$this->markTestIncomplete();
	}
}
