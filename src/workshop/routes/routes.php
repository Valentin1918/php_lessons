<?php

$router = new \App\Router();

$router->add('get', '/', \App\Controllers\IndexController::class, 'index');
$router->add('get', '/forms', \App\Controllers\FormController::class, 'index');
$router->add('get', '/forms/view', \App\Controllers\FormController::class, 'view');

return $router;