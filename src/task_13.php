<?php

class Stack
{
    private $n = 5;
    private $container = [];
    private $top = 0;

    public function push($element)
    {
        if ($this->top >= $this->n) {
            throw new Exception('Overflow error. Stack is full.');
        }
        $this->container[$this->top] = $element;
        $this->top++;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new Exception('Underflow error. Stack is empty.');
        } else {
            $this->top--;
            return $this->container[$this->top];
        }
    }

    public function isEmpty()
    {
        return $this->top === 0;
    }
}


class Queue
{
    function __construct() {
        $this->st1 = new Stack();
        $this->st2 = new Stack();
    }

    public function enqueue($x)
    {
        $this->st1->push($x);
    }

    public function dequeue()
    {
        // transfer all elements of st1 into st2
        while (!$this->st1->isEmpty()) {
            $this->st2->push($this->st1->pop());
        }
        $x = $this->st2->pop();
        // transfer all elements of st2 back to st1
        while (!$this->st2->isEmpty()) {
           $this->st1->push($this->st2->pop());
        }
        return $x;
    }
}

$queue1 = new Queue();
$queue1->enqueue('trololo1');
$queue1->enqueue('trololo2');
$queue1->enqueue('trololo3');
$queue1->enqueue('trololo4');
$queue1->enqueue('trololo5');
//$queue1->enqueue('trololo6');
echo $queue1->dequeue().PHP_EOL;
echo $queue1->dequeue().PHP_EOL;
echo $queue1->dequeue().PHP_EOL;
echo $queue1->dequeue().PHP_EOL;
echo $queue1->dequeue().PHP_EOL;
//$queue1->dequeue();
