<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class AzureTest
 * @package cases\file
 */
class AzureTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToAzure()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadAzure()
	{
		$this->markTestIncomplete();
	}
}
