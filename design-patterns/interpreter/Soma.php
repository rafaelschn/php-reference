<?php

class Soma implements Expressao
{
	private $left;
	private $right;

	public function __construct(Expressao $left, Expressao $right)
	{
		$this->left = $left;
		$this->right = $right;
	}

	public function avalia()
	{
		$leftVal = $this->left->avalia();
		$rightVal = $this->right->avalia();
		return $leftVal + $rightVal;
	}
}
