<?php

class Leilao
{
	private $descricao;
	private $lances;
	
	function __construct($descricao)
	{
		$this->descricao = $descricao;
		$this->lances = array();
	}
	
	public function propoe(Lance $lance) {
		if(count($this->lances) == 0 || $this->podeDarLance($lance->getUsuario()))
			$this->lances[] = $lance;
	}

	private function podeDarLance(Usuario $usuario)
	{
		$total = $this->contaLancesDo($usuario);
		return (count($this->lances) == 0 || $this->pegaUltimoLance()->getUsuario() != $usuario) && $total < 5;
	}

	private function contaLancesDo(Usuario $usuario)
	{
		$total = 0;
		foreach ($this->lances as $lanceAtual):
			if($lanceAtual->getUsuario() == $usuario) ++$total;
		endforeach;
		return $total;
	}

	public function pegaUltimoLance()
	{
		return $this->lances[count($this->lances)-1];
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getLances()
	{
		return $this->lances;
	}

	public function dobraLance(Usuario $usuario)
	{
    	$ultimo = null;
    	foreach($this->lances as $lance) {
    	    if($lance->getUsuario()->getNome() == $usuario->getNome()) $ultimo = $lance;
    	}
    	$this->propoe(new Lance($usuario, $ultimo->getValor()*2));
	}
}
