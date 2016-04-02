
<?php

require_once '../Lance.php';
require_once '../Leilao.php';
require_once '../Usuario.php';
require_once '../Avaliador.php';
require_once '../ConstrutorLeilao.php';

class AvaliadorTest extends PHPUnit_Framework_TestCase
{

	private $avaliador;

	public static function setUpBeforeClass()
	{
  		var_dump("before class");
	}

	public static function testandoAfterClass()
	{
  		var_dump("after class");
	}

	public function setUp()
	{
		$this->avaliador = new Avaliador();
		var_dump("inicializando teste!");
	}

	public function tearDown()
	{
  		var_dump("fim");
	}

	public function testDeveAvaliarTodosLancesCorretamente()
	{
		$leilao = new Leilao('Leilao 1');

		$user1 = new Usuario('User 1');
		$user2 = new Usuario('User 2');
		$user3 = new Usuario('User 3');

		$leilao->propoe(new Lance($user1, 300));
		$leilao->propoe(new Lance($user2, 600));
		$leilao->propoe(new Lance($user3, 400));

		$this->avaliador->avalia($leilao);

		$maiorEsperado = 600;
		$menorEsperado = 300;

		$this->assertEquals($maiorEsperado, $this->avaliador->getMaiorLance());
		$this->assertEquals($menorEsperado, $this->avaliador->getMenorLance());
	}

	public function testDeveAvaliarLancesEmOrdemDecrescente()
	{
		$leilao = new Leilao('Leilao 1');

		$user1 = new Usuario('User 1');
		$user2 = new Usuario('User 2');
		$user3 = new Usuario('User 3');

		$construtor = new ConstrutorLeilao();
		$leilao = $construtor->para('Leilao 1')
		->lance($user1, 400)
		->lance($user2, 300)
		->lance($user3, 200)
		->lance($user1, 100)
		->constroi();
		
		$this->avaliador->avalia($leilao);

		$maiorEsperado = 400;
		$menorEsperado = 100;

		$this->assertEquals($maiorEsperado, $this->avaliador->getMaiorLance());
		$this->assertEquals($menorEsperado, $this->avaliador->getMenorLance());
	}

	public function testDeveAvaliarLancesEmOrdemAleatoria()
	{
		$leilao = new Leilao('Leilao 1');

		$user1 = new Usuario('User 1');
		$user2 = new Usuario('User 2');
		$user3 = new Usuario('User 3');

		$leilao->propoe(new Lance($user1, 200));
		$leilao->propoe(new Lance($user2, 450));
		$leilao->propoe(new Lance($user3, 120));
		$leilao->propoe(new Lance($user1, 700));
		$leilao->propoe(new Lance($user2, 630));
		$leilao->propoe(new Lance($user3, 230));

	
		$this->avaliador->avalia($leilao);

		$maiorEsperado = 700;
		$menorEsperado = 120;

		$this->assertEquals($maiorEsperado, $this->avaliador->getMaiorLance());
		$this->assertEquals($menorEsperado, $this->avaliador->getMenorLance());
	}

	public function testDeveAvaliarApenasUmLance()
	{
		$leilao = new Leilao('Leilao 1');

		$user1 = new Usuario('User 1');

		$leilao->propoe(new Lance($user1, 300));

		
		$this->avaliador->avalia($leilao);

		$maiorEsperado = 300;
		$menorEsperado = 300;

		$this->assertEquals($maiorEsperado, $this->avaliador->getMaiorLance());
		$this->assertEquals($menorEsperado, $this->avaliador->getMenorLance());
	}

	public function testDeveCalcularAMedia()
	{
        $joao = new Usuario("Joao");
        $jose = new Usuario("José");
        $maria = new Usuario("Maria");

        $leilao = new Leilao("Playstation 3 Novo");

        $leilao->propoe(new Lance($maria,300.0));
        $leilao->propoe(new Lance($joao,400.0));
        $leilao->propoe(new Lance($jose,500.0));

       
        $this->avaliador->avalia($leilao);

        $this->assertEquals(400, $this->avaliador->getMedia(), 0.0001);
    }

    public function testDevePegarOsTresMaiores()
    {
    	$leilao = new Leilao("Play");

    	$user1 = new Usuario('User1');
    	$user2 = new Usuario('User2');

    	$leilao->propoe(new Lance($user1, 200));
    	$leilao->propoe(new Lance($user2, 300));
    	$leilao->propoe(new Lance($user1, 400));
    	$leilao->propoe(new Lance($user2, 500));

    	
    	$this->avaliador->avalia($leilao);

    	$this->assertEquals(3, count($this->avaliador->getMaiores()));
    	$this->assertEquals(500, $this->avaliador->getMaiores()[0]->getValor());
    	$this->assertEquals(400, $this->avaliador->getMaiores()[1]->getValor());
    	$this->assertEquals(300, $this->avaliador->getMaiores()[2]->getValor());
    }

    /**
	* @expectedException InvalidArgumentException
    */
    public function testDeveRecusarLeilaoSemLances()
    {
		$construtor = new ConstrutorLeilao();
		$leilao = $construtor->para('Product')
		->constroi();
		$this->avaliador->avalia($leilao);
		$this->assertTrue(false);
    }
}
