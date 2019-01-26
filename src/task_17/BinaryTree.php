<?php
require __DIR__ . '/BinaryNode.php';
class BinaryTree
{
    protected $root; // the root node of our tree

    public function __construct() {
        $this->root = null;
    }

    public function isEmpty() {
        return $this->root === null;
    }

    public function insert($item) {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            // special case if tree is empty
            $this->root = $node;
        }
        else {
            // insert the node somewhere in the tree starting at the root
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree) {
        if ($subtree === null) {
            // insert node here if subtree is empty
            $subtree = $node;
        }
        else {
            if ($node->value > $subtree->value) {
                // keep trying to insert right
                $this->insertNode($node, $subtree->right);
            }
            else if ($node->value < $subtree->value) {
                // keep trying to insert left
                $this->insertNode($node, $subtree->left);
            }
            else {
                throw new Exception("Duplicate is rejected!");
            }
        }
    }

    protected function find($node, $level, &$maxLevel, &$res) {
        if ($node !== null) {
            $this->find($node->left, ++$level, $maxLevel, $res);

            // Update level and resue
            if ($level > $maxLevel) {
                $res = $node->value;
                $maxLevel = $level;
            }

            $this->find($node->right, $level, $maxLevel, $res);
        }
    }

    // Returns value of deepest node
    public function get_deepest() {
        if ($this->isEmpty()) {
            throw new Exception("Nothing to search!");
        }
        // Initialze result and max level
        $res = -1;
        $maxLevel = -1;

        // Updates value "res" and "maxLevel"
        // Note that res and maxLen are passed by reference.
        $this->find($this->root, 0, $maxLevel, $res);
        return $res;
    }

    public function traverse() {
        // dump the tree rooted at "root"
        $this->root->dump();
    }

    public function get_biggest() {
        return $this->root->goRight();
    }

    public function get_smallest() {
        return $this->root->goLeft();
    }
}

$btObject = new BinaryTree();
$btObject->insert(16);
$btObject->insert(4);
$btObject->insert(7);
$btObject->insert(1);
$btObject->insert(34);
$btObject->insert(69);
$btObject->insert(103);
$btObject->insert(55);

//$btObject->traverse();
var_dump($btObject->get_biggest());
var_dump($btObject->get_smallest());

try {
    var_dump($btObject->get_deepest());
} catch (Exception $e) {
    var_dump("Error: {$e->getMessage()}");
}
