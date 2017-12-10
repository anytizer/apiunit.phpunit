<?php
namespace others;

use \Exception;

class mimer
{
	/**
	 * @param $filename
	 * @return string
	 * @throws Exception
	 */
	public function get_mime($filename): string
	{
		if(!is_file($filename))
		{
			throw new Exception("Not a valid file: {$filename} to check mime.");
		}

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime = finfo_file($finfo, $filename);
		finfo_close($finfo);

		return $mime;
	}
}