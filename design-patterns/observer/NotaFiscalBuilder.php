<?php

class NotaFiscalBuilder
{
	private $empresa;
	private $cnpj;
	private $itens;
	private $valorBruto;
	private $valorImpostos;
	private $observacoes;
	private $dataEmissao;

	private $observers;

	public function __construct($observers = [])
	{
		$this->valorBruto = 0;
		$this->valorImpostos = 0;
		$this->itens = [];
		$this->dataEmissao = date('Y-m-d h:i:s');
		$this->observers = $observers;
	}

	public function addObserver(NotaFiscalObserver $observer)
	{
		$this->observers[] = $observer;
		return $this;
	}

	public function comEmpresa($empresa)
	{
		$this->empresa = $empresa;
		return $this;
	}

	public function comCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
		return $this;
	}

	public function comObservacoes($observacoes)
	{
		$this->observacoes = $observacoes;
		return $this;
	}

	public function naData($data)
	{
		$this->dataEmissao = $data;
		return $this;
	}

	public function addItem(Item $item)
	{
		$this->itens[] = $item;
		$this->valorBruto += $item->getValor();
		$this->valorImpostos += $item->getValor() * 0.2;
		return $this;
	}

	public function build()
	{
		$nf = new NotaFiscal(
			$this->empresa, 
			$this->cnpj, 
			$this->itens, 
			$this->valorBruto, 
			$this->valorImpostos, 
			$this->observacoes, 
			$this->dataEmissao
		);
		
		foreach($this->observers as $observer):
			$observer->execute($nf);
		endforeach;
		
		return $nf;
	}
}
