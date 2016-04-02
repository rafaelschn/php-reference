<?php

/**
 * Interface to provide accessing objects as arrays.
 * */

class ArrayAccessTest implements ArrayAccess
{
    private $container = array();

    public function __construct()
    {
        $this->container = array(
            "one"   => 1,
            "two"   => 2,
            "three" => 3,
        );
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$obj = new ArrayAccessTest();

var_dump(isset($obj["two"]));
var_dump($obj["two"]);
unset($obj["two"]);
$obj["two"] = "A value";
$obj[] = 'Append 1';
