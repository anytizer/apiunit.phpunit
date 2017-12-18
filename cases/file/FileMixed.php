<?php
namespace cases\file;

use connections\relay;
use endpoints\endpoints;
use others\ReadyToUpload;
use \PHPUnit\Framework\TestCase;

class FileMixedTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->upload_single;
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
