<?php
namespace endpoints;

use PHPUnit\Runner\Exception;
use \ReflectionObject;
use \ReflectionProperty;

final class endpoints extends settings
{
	private $root;
	public function __construct()
	{
		// @todo Use singleton output, no multiple instances

		// set the server
		// $this->root = "http://api.example.com:9090/tests"; // $root;
		$this->root = "http://192.168.0.100/angular/libraries/apiunit.phpunit/src/api.tests"; // $root;

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
		throw new Exception("Cloning not allowed.");
	}

	private function __wakeup()
	{
		throw new Exception("Wakeup not allowed.");
	}

	public function __set($name, $value)
	{
		throw new Exception("Not allowed to set new index: ".$name);
	}

	public function __get($index)
	{
		throw new Exception("Looking for invalid index: ".$index);
	}
}