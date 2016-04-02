

<?php

require_once '../Lance.php';
require_once '../Usuario.php';

class LanceTest extends PHPUnit_Framework_TestCase
{

	/**
	* @expectedException Exception
	*/
	public function testBarrarLancesMenoresQueZero()
	{
		new Lance(new Usuario('User 1'), -1);
	}

	/**
	* @expectedException Exception
	*/
	public function testBarrarLancesIguaisAZero()
	{
		new Lance(new Usuario('User 1'), 0);
	}
}
