<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class MediaFireTest
 * @package cases\file
 *
 * @see https://www.mediafire.com/
 */
class MediaFireTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToMediaFire()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadMediaFire()
	{
		$this->markTestIncomplete();
	}
}
