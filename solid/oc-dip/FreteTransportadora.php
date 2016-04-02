<?php

class FreteTransportadora implements Frete
{
	public function para($cidade)
	{
		if(strtoupper($cidade) == 'SAO PAULO') return 5;
		return 10;
	}
}
