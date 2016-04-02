<?php

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$order1 = new Pedido('Customer 1', 200);
$order2 = new Pedido('Customer 2', 1200);
$order3 = new Pedido('Customer 3', 25);
$order4 = new Pedido('Customer 4', 7);
$order5 = new Pedido('Customer 5', 70);

$queue = new CommandQueue();
$queue->add(new PedidoPagarCommand($order1));
$queue->add(new PedidoPagarCommand($order2));
$queue->add(new PedidoPagarCommand($order3));
$queue->add(new PedidoPagarCommand($order4));
$queue->add(new PedidoPagarCommand($order5));

$queue->add(new PedidoFinalizarCommand($order3));
$queue->process();

var_dump($order1);
