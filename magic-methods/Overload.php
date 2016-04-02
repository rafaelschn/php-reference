<?php

/**
 * @property-read name
 * @property-read price
 */
class Overload
{
	private $data = array('test'=>123);
	
	public function __set($name, $value)
	{
		echo "Setting '$name' to '$value'" . PHP_EOL;
		$this->data[$name] = $value;
	}
	
	public function __get($name)
	{
		echo "Getting '$name'" . PHP_EOL;
		if (array_key_exists($name, $this->data))
			return $this->data[$name];
		
		$trace = debug_backtrace();
		trigger_error(
		'Undefined property via __get(): ' . $name .
		' in ' . $trace[0]['file'] .
		' on line ' . $trace[0]['line'],
		E_USER_NOTICE);
		return null;
	}
	
	public function __isset($name)
	{
		echo "Is '$name' set?" . PHP_EOL;
		return isset($this->data[$name]);
	}
	
	public function __unset($name)
	{
		echo "Unsetting '$name'" . PHP_EOL;
		unset($this->data[$name]);
	}
	
	public function __call($name, $args)
	{
		echo 'Calling dynamic method ', $name, ' with arguments ', implode(', ', $args), PHP_EOL;
	}
	
	public static function __callStatic($name, $args)
	{
		echo 'Calling static method ', $name, ' with arguments ', implode(', ', $args), PHP_EOL;
	}
	
	public function __toString()
	{
		$this->name = 'hello';
		$this->price = 2.99;
		
		return 'To string ' . $this->test . ' w/ data: ' . implode(', ', array_keys($this->data)) . PHP_EOL;
	}
}
