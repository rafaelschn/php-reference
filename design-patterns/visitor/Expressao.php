<?php

interface Expressao
{
	public function avalia();
	public function aceita(Visitor $visitor);
}
