<?php

class Construct
{
	public function __construct()
	{
		$a = func_get_args ();
		$i = func_num_args ();
		if (method_exists ( $this, $f = '__construct' . $i )) {
			call_user_func_array ( array (
					$this,
					$f 
			), $a );
		} else {
			$this->name = 'hello';
			echo ('__construct with 0 param called' . PHP_EOL);
		}
	}

	function __construct1($a1)
	{
		$this->name = 'hello1';
		echo ('__construct with 1 param called: ' . $a1 . PHP_EOL);
	}

	function __construct2($a1, $a2)
	{
		$this->name = 'hello2';
		echo ('__construct with 2 params called: ' . $a1 . ',' . $a2 . PHP_EOL);
	}
	
	public function __destruct()
	{
		print "Destroying " . $this->name . PHP_EOL;
	}
}
