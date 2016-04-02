<?php

class FreteCorreios implements Frete
{
	public function para($cidade)
	{
		if(strtoupper($cidade) == 'SAO PAULO') return 15;
		return 30;
	}
}
