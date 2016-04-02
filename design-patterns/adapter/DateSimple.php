<?php

class DateSimple implements Date
{
	public function getDay()
	{
		return date('d');
	}

	public function getMonth()
	{
		return date('m');
	}
}
