<?php

class CommandQueue
{
	private $commands;

	public function __construct()
	{
		$this->commands = [];
	}

	public function add(Command $command)
	{
		$this->commands[] = $command;
	}

	public function process()
	{
		foreach($this->commands as $command):
			$command->execute();
		endforeach;
	}
}
