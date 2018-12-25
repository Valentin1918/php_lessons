<?php

class Stack
{
    private $n = 1000;
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

    public function count()
    {
        return count($this->container);
    }
}


class PairStack
{
    function __construct($l, $r) {
        $this->l = $l;
        $this->r = $r;
        $this->left = new Stack();
        $this->right = new Stack();
    }

    public function push($br)
    {
        if ($br === $this->l) {
            $this->left->push($br);
        }
        if ($br === $this->r) {
            $this->right->push($br);
        }
    }

    public function isEqual()
    {
        return $this->left->count() === $this->right->count();
    }
}

class CheckBrackets
{
    function __construct() {
        $this->ps1 = new PairStack('[', ']');
        $this->ps2 = new PairStack('<', '>');
        $this->ps3 = new PairStack('{', '}');
        $this->ps4 = new PairStack('(', ')');
        $this->map = [
            '[' => $this->ps1,
            ']' => $this->ps1,
            '<' => $this->ps2,
            '>' => $this->ps2,
            '{' => $this->ps3,
            '}' => $this->ps3,
            '(' => $this->ps4,
            ')' => $this->ps4,
        ];
    }

    public function check($string)
    {
        $this->fill($string);
        return $this->ps1->isEqual() && $this->ps2->isEqual() && $this->ps3->isEqual() && $this->ps4->isEqual();
    }

    private function fill($string)
    {
        $strArr = str_split($string);
        foreach ($strArr as $key) {
            if (isset($this->map[$key])) {
                $this->map[$key]->push($key);
            }
        }
    }
}

$cb1 = new CheckBrackets();
var_export($cb1->check('{[<()>]}'));
echo PHP_EOL;
$cb2 = new CheckBrackets();
var_export($cb2->check('{[(<()>)]}'));
echo PHP_EOL;
$cb3 = new CheckBrackets();
var_export($cb3->check('{[<()>}'));
echo PHP_EOL;
$cb4 = new CheckBrackets();
var_export($cb4->check('{{((]})[})'));
echo PHP_EOL;
