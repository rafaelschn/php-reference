<?php

class IteratorTest implements Iterator
{
	private $position = 0;
	private $array = array(
		"firstelement",
		"secondelement",
		"lastelement",
	);
	
	public function __construct()
	{
		$this->position = 0;
	}
	
	function rewind()
	{
		$this->position = 0;
	}
	
	function current()
	{
		return $this->array[$this->position];
	}
	
	function key()
	{
		return $this->position;
	}
	
	function next()
	{
		++$this->position;
	}
	
	function valid()
	{
		return isset($this->array[$this->position]);
	}	
}

$it = new IteratorTest();

foreach($it as $key => $value):
	var_dump($key, $value);
	echo "\n";
endforeach;

class FileReader implements Iterator {
	protected $fileHandle;

	protected $line;
	protected $i;

	public function __construct($fileName) {
		if (!$this->fileHandle = fopen($fileName, 'r')) {
			throw new RuntimeException('Couldn\'t open file "' . $fileName . '"');
		}
	}

	public function rewind() {
		fseek($this->fileHandle, 0);
		$this->line = fgets($this->fileHandle);
		$this->i = 0;
	}

	public function valid() {
		return false !== $this->line;
	}

	public function current() {
		return $this->line;
	}

	public function key() {
		return $this->i;
	}

	public function next() {
		if (false !== $this->line) {
			$this->line = fgets($this->fileHandle);
			$this->i++;
		}
	}

	public function __destruct() {
		fclose($this->fileHandle);
	}
}
