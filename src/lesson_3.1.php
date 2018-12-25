<?php
/**
 * In a stack, the element deleted from the set is the one most recently inserted: the stack implements a last-in, first-out, or LIFO, policy.
 * Class Stack
 */
class Stack
{
    private $n = 5;
    private $container = [];
    private $top = 0;

    /**
     * The INSERT operation on a stack is often called PUSH
     * @param $element
     * @throws Exception
     */
    public function push($element)
    {
        if ($this->top + 1 > $this->n) {
            throw new Exception('Overflow error. Stack is full.');
        }
        $this->top = $this->top + 1;
        $this->container[$this->top - 1] = $element;
    }

    /**
     * and the DELETE operation, which does not take an element argument, is often called POP
     */
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new Exception('Underflow error. Stack is empty.');
        } else {
            $this->top = $this->top - 1;
            return $this->container[$this->top - 1];
        }
    }

    public function isEmpty()
    {
        if ($this->top === 0) {
            return true;
        } else {
            return false;
        }
    }
}
