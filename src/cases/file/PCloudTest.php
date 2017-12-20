<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class PCloudTest
 * @package cases\file
 *
 * @see https://docs.pcloud.com/
 */
class PCloudTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToPCloud()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadPCloud()
	{
		$this->markTestIncomplete();
	}
}
