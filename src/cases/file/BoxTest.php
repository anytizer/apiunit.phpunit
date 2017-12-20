<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class BoxTest
 * @package cases\file
 *
 * @see https://www.box.com/
 * @see https://developer.box.com/
 * @see https://developer.box.com/docs/
 */
class BoxTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToBox()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadBox()
	{
		$this->markTestIncomplete();
	}
}
