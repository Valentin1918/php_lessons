<?php
class SeparateObject
{
    public $prev;
    public $next;
    public $key;
    public $value;
    /**
     * SeparateObject constructor.
     * @param $prev
     * @param $next
     * @param $key
     */
    public function __construct($key, $value)
    {
//        $this->prev = $prev;
//        $this->next = $next;
        $this->key = $key;
        $this->value = $value;
    }
}