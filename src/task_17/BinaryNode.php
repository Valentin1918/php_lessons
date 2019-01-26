<?php

class BinaryNode
{
    public $value;    // contains the node item
    public $left;     // the left child BinaryNode
    public $right;     // the right child BinaryNode

    public function __construct($item) {
        $this->value = $item;
        // new nodes are leaf nodes
        $this->left = null;
        $this->right = null;
    }

    // perform an in-order traversal of the current node
    public function dump() {
        if ($this->left !== null) {
            $this->left->dump();
        }
        var_dump($this->value);
        if ($this->right !== null) {
            $this->right->dump();
        }
    }

    public function goRight() {
        if ($this->right !== null) {
            return $this->right->goRight();
        }
        return $this->value;
    }

    public function goLeft() {
        if ($this->left !== null) {
            return $this->left->goLeft();
        }
        return $this->value;
    }
}