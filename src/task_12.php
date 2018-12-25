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
