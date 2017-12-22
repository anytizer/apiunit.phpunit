<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class GoogleDriveTest
 * @package cases\file
 */
class GoogleDriveTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToGoogleDrive()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadFromGoogleDrive()
	{
		$this->markTestIncomplete();
	}
}
