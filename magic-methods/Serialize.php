<?php

class Serialize
{
	public $a;
	protected $b;
	private $c;
	public $d;
	
	public function __sleep()
	{
		//return an array only containing the names of instance-variables to serialize
		echo 'Going to sleep...' . PHP_EOL;
		return array('a', 'd');
	}
	
	function __wakeup()
	{
		echo 'Waking up...' . PHP_EOL;
		$this->show();
	}
	
	protected function show()
	{
		echo $this->a . ' ' .$this->d . PHP_EOL;
	}
	
	public function __invoke($x)
	{
		echo 'invoked' . PHP_EOL;
	}
	
	public static function __set_state($array)
	{
		echo 'On var export...' . PHP_EOL;
		return $array;
	}
}
