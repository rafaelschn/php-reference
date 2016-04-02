<?php

class Debug
{
	private $prop;
	
	public function __construct($val)
	{
		$this->prop = $val;
	}
	
	public function __debugInfo()
	{
		return array(
			'propSquared' => $this->prop * 2,
		);
	}
	
	public function __clone()
	{
		echo 'Cloning...' . PHP_EOL;
	}
}
