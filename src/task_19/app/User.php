<?php
namespace App;
class User
{
    protected static $count = 0;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
        self::$count++;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getCount()
    {
        return self::$count;
    }
}