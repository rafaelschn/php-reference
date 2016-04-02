<?php

class BusinessFacade
{
	private static $instance = null;

	private function __construct(){}

	public static function getInstance()
	{
		if(is_null(self::$instance)) self::$instance = new self();
		return self::$instance;
	}

	public function createSomething()
	{
		echo 'Creating something!<br>';
	}

	public function doSomething()
	{
		echo 'Doing something!<br>';
	}
}
