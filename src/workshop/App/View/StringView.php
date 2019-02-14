<?php

namespace App\View;

class StringView implements ViewInterface
{
    protected $string;
    public function __construct($string)
    {
        $this->string = $string;
    }

    public function render()
    {
        echo $this->string;
    }
}
