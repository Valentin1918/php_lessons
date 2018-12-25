<?php

class Queue
{
    private $container = [];
    private $head = 0;
    private $tail = 0;
    private $length = 5;

    public function enqueue($x)
    {
        if ($this->tail - $this->head >= $this->length) {
            throw new Exception('Queue is overflowed!');
        } else {
            $this->container[$this->tail] = $x;
            $this->tail = $this->tail + 1;
        }
    }

    public function dequeue()
    {
        $x = $this->container[$this->head];
        if ($this->isEmpty()) {
            throw new Exception('Queue is empty!');
        } else {
            $this->head = $this->head + 1;
        }
        return $x;
    }

    public function isEmpty()
    {
        return $this->tail - $this->head <= 0;
    }
}

class Stack
{
    function __construct() {
        $this->qu1 = new Queue();
        $this->qu2 = new Queue();
    }

    public function push($element)
    {
        $this->qu1->enqueue($element);
    }

    public function pop()
    {
        // transfer all elements of qu1 into qu2
        while (!$this->qu1->isEmpty()) {
            $this->qu2->enqueue($this->qu1->dequeue());
        }
        $x = $this->qu2->dequeue();
        // transfer all elements of qu2 back to qu1
        while (!$this->qu2->isEmpty()) {
            $this->qu1->enqueue($this->qu2->dequeue());
        }
        return $x;
    }

    public function isEmpty()
    {
        return $this->qu1->isEmpty();
    }
}

$stack = new Stack();
$stack->push('trololo1');
$stack->push('trololo2');
$stack->push('trololo3');
$stack->push('trololo4');
$stack->push('trololo5');
//$stack->push('trololo6');
echo $stack->pop().PHP_EOL;
echo $stack->pop().PHP_EOL;
echo $stack->pop().PHP_EOL;
echo $stack->pop().PHP_EOL;
echo $stack->pop().PHP_EOL;
//$stack->pop();
