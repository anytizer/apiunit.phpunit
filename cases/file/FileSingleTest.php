<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\mimer;
use others\ReadyToUpload;
use \CURLFile;
use \PHPUnit\Framework\TestCase;

class FileSingleTest extends TestCase
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
		$filename = "C:/hiberfil.sys";
		$ru = new ReadyToUpload();

		$_POST = array(
			"profile" => $ru->collect($filename),
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$response = json_decode($result, true);
		print_r($response);

		$this->assertTrue(is_array($response));
		$this->assertArrayHasKey("tmp_name", $response);
	}

	public function testUploadSingleFileLegacyCurlMethod()
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
		print_r($response);

		$this->assertArrayHasKey("tmp_name", $response);
		$this->assertEquals(filesize($filename), $response["size"]);
	}

	public function testUploadSingleFileWithReadyToUpload()
	{
		// Do not use @
		// CURLOPT_SAFE_UPLOAD
		// http://php.net/manual/en/function.curl-setopt.php
		// http://php.net/manual/en/class.curlfile.php
		// http://php.net/manual/en/curlfile.construct.php
		// https://wiki.php.net/rfc/curl-file-upload
		// http://php.net/curl_file_create -- procedural to CurlFile

		$filename = "resources/acs.png";

		$mimer = new mimer();
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
		print_r($response);

		$this->assertTrue(is_array($response));
		$this->assertArrayHasKey("tmp_name", $response);

		//$this->markTestIncomplete();
	}
}
