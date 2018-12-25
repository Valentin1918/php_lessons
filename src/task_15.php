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

    public function clear()
    {
        $this->container = [];
        $this->top = 0;
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

    public function clear()
    {
        $this->left->clear();
        $this->right->clear();
    }
}

class CheckBrackets
{
    function __construct($bracketsObj) {
        $this->map = [];
        $this->funcMap = [];
        foreach ($bracketsObj as $key => $value) {
            $name = 'ps'.$key;
            $this->$name = new PairStack($value['l'], $value['r']);
            array_push($this->funcMap, $this->$name);
            $this->map[$value['l']] = $this->$name;
            $this->map[$value['r']] = $this->$name;
        }
    }

    private function clearAll()
    {
        foreach ($this->funcMap as $key) {
            $key->clear();
        }
    }

    public function check($string)
    {
        $this->fill($string);
        $res = array_reduce($this->funcMap, function ($acc, $n) {
            return $acc && $n->isEqual();
        }, true);
        $this->clearAll();
        return $res;
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

$cb = new CheckBrackets(
    [
        ['l' => '{', 'r' => '}'],
        ['l' => '[', 'r' => ']'],
        ['l' => '(', 'r' => ')'],
        ['l' => '<', 'r' => '>'],
    ]
    );
var_export($cb->check('{[<()>]}'));
echo PHP_EOL;
var_export($cb->check('{[(<()>)]}'));
echo PHP_EOL;
var_export($cb->check('{[<()>}'));
echo PHP_EOL;
var_export($cb->check('{{((]})[})'));
echo PHP_EOL;
