<?php

class NotaFiscal
{
	private $empresa;
	private $cnpj;
	private $itens;
	private $valorBruto;
	private $valorImpostos;
	private $observacoes;
	private $dataEmissao;

	public function __construct($empresa, $cnpj, $itens, $valorBruto, $valorImpostos, $observacoes, $dataEmissao)
	{
		$this->empresa = $empresa;
		$this->cnpj = $cnpj;
		$this->itens = $itens;
		$this->valorBruto = $valorBruto;
		$this->valorImpostos = $valorImpostos;
		$this->observacoes = $observacoes;
		$this->dataEmissao = $dataEmissao;
	}

	public function getEmpresa()
	{
		return $this->empresa;
	}

	public function getCnpj()
	{
		return $this->cnpj;
	}
}
