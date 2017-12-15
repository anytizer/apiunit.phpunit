<?php
namespace endpoints;

use \ReflectionObject;
use \ReflectionProperty;

final class endpoints extends settings
{
	private $root;
	public function __construct()
	{
		// @todo Use singleton output, no multiple instances

		// set the server
		$this->root = "http://api.example.com:9090"; // $root;

		/**
		 * foreach public endpoints, prepend the host name
		 */
		$properties = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
		foreach($properties as $property)
		{
			$name = $property->name;
			$this->$name = "{$this->root}/{$this->$name}";
		}
	}

	private function __clone()
	{
		//
	}

	private function __wakeup()
	{
		//
	}

	public function __set($name, $value)
	{
		die("Exception no index");
	}

	public function __get($index)
	{
		die("Looking for ".$index);
	}
}