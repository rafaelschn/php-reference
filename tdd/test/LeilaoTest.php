
<?php

require_once '../Lance.php';
require_once '../Leilao.php';
require_once '../Usuario.php';
require_once '../Avaliador.php';

class LeilaoTest extends PHPUnit_Framework_TestCase
{
	public function testDeveAvaliarTodosLancesCorretamente()
	{
		$leilao = new Leilao('MacBook Pro');
		$this->assertEquals(0, count($leilao->getLances()));
		$user1 = new Usuario('User 1');
		$leilao->propoe(new Lance($user1, 2000));

		$this->assertEquals(1, count($leilao->getLances()));
		$this->assertEquals(2000, $leilao->getLances()[0]->getValor());
	}

	public function testDeveBarrarDoisLancesSeguidos()
	{
		$leilao = new Leilao('MacBook');
		$user = new Usuario('João');
		$leilao->propoe(new Lance($user, 2000));
		$leilao->propoe(new Lance($user, 2500));
		$this->assertEquals(1, count($leilao->getLances()));
		$this->assertEquals(2000, $leilao->getLances()[0]->getValor());
	}

	public function testDeveDarNoMaximoCincoLances()
	{
		$leilao = new Leilao('MacBook');
		$user = new Usuario('João');
		$user1 = new Usuario('Maria');
		$leilao->propoe(new Lance($user, 2000));
		$leilao->propoe(new Lance($user1, 2500));
		$leilao->propoe(new Lance($user, 3000));
		$leilao->propoe(new Lance($user1, 4000));
		$leilao->propoe(new Lance($user, 5000));
		$leilao->propoe(new Lance($user1, 6000));
		$leilao->propoe(new Lance($user, 7000));
		$leilao->propoe(new Lance($user1, 8000));
		$leilao->propoe(new Lance($user, 9000));
		$leilao->propoe(new Lance($user1, 10000));

		$leilao->propoe(new Lance($user, 11000));
		$this->assertEquals(10, count($leilao->getLances()));
		$this->assertEquals(10000, $leilao->getLances()[9]->getValor());
	}

    public function testDeveDobrarOUltimoLanceDado()
    {
	    $leilao = new Leilao("Macbook Pro 15");
	    $steveJobs = new Usuario("Steve Jobs");
	    $billGates = new Usuario("Bill Gates");

	    $leilao->propoe(new Lance($steveJobs, 2000));
	    $leilao->propoe(new Lance($billGates, 3000));
	    $leilao->dobraLance($steveJobs);

	    $this->assertEquals(4000, $leilao->getLances()[2]->getValor(), 0.00001);
	}
}
