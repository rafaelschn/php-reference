<?php

class ConstrutorLeilao
{
	private $leilao;

	public function para($desc)
	{
		$this->leilao = new Leilao($desc);
		return $this;
	}

	public function lance(Usuario $user, $val)
	{
		$this->leilao->propoe(new Lance($user, $val));
		return $this;
	}

	public function constroi()
	{
		return $this->leilao;
	}
}
