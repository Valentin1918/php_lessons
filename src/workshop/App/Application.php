<?php
namespace App;

use App\Http\Request;

class Application
{
    protected $request;
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handleRequest(Request $request)
    {
        $data = $this->router->resolve($request);
//        p($data);
        $controllerClass = $data['controller'];
//        p($controllerClass);
        $controller = new $controllerClass;
        $action = $data['action'];
        $controller->$action($request->getQueryParams());
//        p('received data', $controller);
    }
}