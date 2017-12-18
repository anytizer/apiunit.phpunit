<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

class AwsTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToAws()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadAws()
	{
		$this->markTestIncomplete();
	}
}
