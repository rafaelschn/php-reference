<?php

class SeekableIteratorTest implements SeekableIterator
{
    private $position = 0;

    private $array = array(
        "first element",
        "second element",
        "third element",
        "fourth element"
    );

    public function seek($position) {
      if (!isset($this->array[$position])) {
          throw new OutOfBoundsException("invalid seek position ($position)");
      }

      $this->position = $position;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}

try {

    $it = new SeekableIteratorTest();
    echo $it->current(), "\n";
    
    $it->seek(2);
    echo $it->current(), "\n";
    
    $it->seek(1);
    echo $it->current(), "\n";
    
    $it->seek(10);
    
} catch (OutOfBoundsException $e) {
    echo $e->getMessage();
}
