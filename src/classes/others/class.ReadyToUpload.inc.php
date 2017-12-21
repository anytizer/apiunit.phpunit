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

		$current_size = filesize($filename);
		$max_size = $this->max_size();
		if($current_size > $max_size)
		{
			throw new Exception("Too large file to upload. Max Allowed: {$max_size}, Current: {$current_size}");
		}

		$mimer = new mimer();
		$mime = $mimer->get_mime($filename);

		$file = new CURLFile($filename, $mime, basename($filename));
		return $file;
	}

	/**
	 * Cannot upload large file sizes
	 * @see https://stackoverflow.com/questions/6846445/get-byte-value-from-shorthand-byte-notation-in-php-ini
	 */
	private function max_size(): int
	{
		// upload_max_filesize
		// post_max_size
		$max = trim(ini_get("upload_max_filesize"));

		$last = strtolower($max[strlen($max)-1]);

		// necessary since PHP 7.1; otherwise optional
		$max  = substr($max, 0, -1);

		switch(strtolower($last))
		{
			case 'g':
				$max *= 1024 * 1024 * 1024;
				break;
			case 'm':
				$max *= 1024 * 1024;
				break;
			case 'k':
				$max *= 1024;
				break;
		}

		return $max;
	}
}