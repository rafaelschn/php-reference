<?php

class IteratorAggregateTest implements IteratorAggregate
{
    public $property1 = "Public property one";
    public $property2 = "Public property two";
    public $property3 = "Public property three";

    public function __construct()
    {
        $this->property4 = "last property";
    }

    public function getIterator()
    {
        return new ArrayIterator($this);
    }
}

$obj = new IteratorAggregateTest();

foreach($obj->getIterator() as $key => $value):
    var_dump($key, $value);
    echo "\n";
endforeach;
