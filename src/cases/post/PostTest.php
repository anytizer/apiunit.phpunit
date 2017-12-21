<?php
namespace cases\post;

use connections\relay;
use endpoints\endpoints;
use \PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * Also see: file_uploads, upload_max_filesize, upload_tmp_dir, post_max_size and max_input_time
 * @package cases\post
 *
 * @see http://php.net/manual/en/features.file-upload.post-method.php
 *
 * phpunit --filter PostTest
 */
class PostTest extends TestCase
{
	private $api_url;

	public function setup()
	{
		$_GET = array();
		$_POST = array();

		$this->api_url = (new endpoints())->post;
	}

	public function testPostMustBePresent1()
	{
		$_POST = array(
			"id" => "present",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("found", $result);
	}

	public function testPostMustBePresent2()
	{
		$_POST = array(
			"id" => "other",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("invalid", $result);
	}

	public function testPostMustBePresent3()
	{
		$_POST = array(
			"other" => "something",
		);

		$relay = new relay();
		$result = $relay->fetch($this->api_url);

		$this->assertEquals("missing", $result);
	}
}
