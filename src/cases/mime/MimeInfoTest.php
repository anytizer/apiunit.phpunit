<?php
namespace cases\mime;

use \PHPUnit\Framework\TestCase;
use \others\mimer;

/**
 * Class MimeInfoTest
 * @package cases\mime
 *
 * phpunit --filter MimeInfoTest
 */
class MimeInfoTest extends TestCase
{
	/**
	 * @see http://php.net/manual/en/function.finfo-file.php
	 *
	 * @param $filename
	 * @return string
	 * @throws \Exception
	 */
	private function mime($filename): string
	{
		$mimer = new mimer();
		$mime = $mimer->get_mime($filename);

		return $mime;
	}

	public function testPdfMime()
	{
		$mime = $this->mime("../resources/reports.pdf");

		$this->assertEquals("application/pdf", $mime);
	}

	public function testTextMime()
	{
		$mime = $this->mime("../resources/readme.txt");

		$this->assertEquals("text/plain", $mime);
	}

	public function testDocxMime()
	{
		$mime = $this->mime("../resources/article.docx");

		$this->assertEquals("application/octet-stream", $mime);
	}

	public function testPresentationMime()
	{
		$mime = $this->mime("../resources/presentation.pptx");

		$this->assertEquals("application/octet-stream", $mime);
	}

	public function testVideoMime()
	{
		$mime = $this->mime("../resources/presentation.mp4");

		$this->assertEquals("video/mp4", $mime);
	}

	public function testImagePngMime()
	{
		$mime = $this->mime("../resources/image.png");

		$this->assertEquals("image/png", $mime);
	}

	public function testImageJpegMime()
	{
		$mime = $this->mime("../resources/image.jpg");

		$this->assertEquals("image/jpeg", $mime);
	}

	public function testImageGifMime()
	{
		$mime = $this->mime("../resources/image.gif");

		$this->assertEquals("image/gif", $mime);
	}

	public function testXmlMime()
	{
		$mime = $this->mime("../resources/article.xml");

		$this->assertEquals("application/xml", $mime);
	}

	public function testJsonMime()
	{
		$mime = $this->mime("../resources/data.json");

		$this->assertEquals("text/plain", $mime);
		$this->markTestIncomplete();
		//$this->markTestSkipped();
	}

	public function testZipMime()
	{
		$mime = $this->mime("../resources/everything.zip");

		$this->assertEquals("application/zip", $mime);
	}
}