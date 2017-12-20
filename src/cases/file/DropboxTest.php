<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

/**
 * Class DropboxTest
 * @package cases\file
 *
 * @see https://www.dropbox.com/developers
 */
class DropboxTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
	}

	public function testUploadToDropbox()
	{
		$this->markTestIncomplete();
	}

	public function testDownloadFromDropbox()
	{
		$this->markTestIncomplete();
	}
}
