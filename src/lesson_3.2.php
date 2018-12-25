<?php

final class Stack1
{
    private $container = [];
    private $length = 5;
    private $top = -1;
    /**
     * @return int
     */
    private function getTop()
    {
        return count($this->container) - 1;
    }
    public function push($element) {
        $this->container[] = $element;
    }
    public function top() {
        return $this->container[$this->getTop()];
    }
    public function pop() {
        if($this->isEmpty()) {
            throw new Exception('Underflow error. Stack is empty.');
        } else {
            $elem = $this->container[$this->getTop()];
            unset($this->container[$this->getTop()]);
            echo json_encode($this->container).PHP_EOL;
            return $elem;
        }
    }
    public function isEmpty() {
        return count($this->container) === 0;
    }
    public function clear() {
        $this->container = [];
    }
}
$obj = new Stack1();
try {
    $obj->push(12);
    $obj->push(18);
    echo $obj->pop()."\n";
    $obj->push(5);
    echo $obj->pop().PHP_EOL;
    $obj->push(8);
    echo $obj->pop().PHP_EOL;
} catch (Throwable $e) {
    echo $e->getMessage();
}