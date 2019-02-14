<?php
namespace App\Http;

interface RouterInterface
{
    /**
     * @param string $method
     * @param string $route
     * @param string $controller
     * @param string $action
     * @return mixed
     */
    public function add(string $method, string $route, string $controller, string $action);

    /**
     * @param RequestInterface $request
     * @return RouteInterface
     */
    public function resolve(RequestInterface $request) : RouteInterface;
}
