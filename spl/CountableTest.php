<?php

class CountableTest implements Countable
{
	protected $_myCount = 3;

	public function count()
	{
		return $this->_myCount;
	}
}

$countable = new CountableTest();
echo count($countable);
