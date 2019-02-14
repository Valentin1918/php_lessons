<?php
namespace App\Http;

class Route implements RouteInterface
{
    private $className;
    private $action;

    public function __construct(string $className, string $action)
    {
        $this->className = $className;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

}