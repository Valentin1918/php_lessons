<?php
namespace App;

use App\Http\RequestInterface;
use App\Http\RouteInterface;
use App\Http\RouterInterface;
use App\View\ViewInterface;

class Application
{
    /**
     * @var RouterInterface
     */
    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param RequestInterface $request
     * @throws \Exception
     */
    public function handleRequest(RequestInterface $request)
    {
        $route = $this->resolve($request);
        $controller = $this->resolveController($route);
        $action = $this->resolveAction($route, $controller);
        $view = $this->exec($controller, $action, $request);
        $this->render($view);
    }

    protected function resolve(RequestInterface $request)
    {
        return $this->router->resolve($request);
    }

    /**
     * @param RouteInterface $route
     * @return mixed
     * @throws \Exception
     */
    protected function resolveController(RouteInterface $route)
    {
        $controllerClass = $route->getClassName();
        if (class_exists($controllerClass)) {
            return new $controllerClass;
        }
        throw new \Exception('Controller class is not exist!');
    }

    /**
     * @param RouteInterface $route
     * @param $controller
     * @return mixed
     * @throws \Exception
     */
    protected function resolveAction(RouteInterface $route, $controller)
    {
        if (method_exists($controller, $route->getAction())) {
            return $route->getAction();
        }
        throw new \Exception('Controller Action is not exist!');
    }

    protected function exec($controller, $action, RequestInterface $request) : ViewInterface
    {
        return $controller->$action($request->getQueryParams());
    }

    protected function render(ViewInterface $view)
    {
        $view->render();
    }

}
