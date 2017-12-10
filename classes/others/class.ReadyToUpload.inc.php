<?php
namespace others;

use \Exception;
use \CURLFile;

class ReadyToUpload
{
	public function collect(string $filename): CURLFile
	{
		if(!is_file($filename))
		{
			throw new Exception("Invalid file name: {$filename}");
		}

		$mimer = new mimer();
		$mime = $mimer->get_mime($filename);

		$file = new CURLFile($filename, $mime, basename($filename));
		return $file;
	}
}