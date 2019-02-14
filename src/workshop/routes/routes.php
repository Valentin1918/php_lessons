<?php

use App\Controllers\FormController as Form;
use App\Controllers\IndexController as Index;
use App\Http\Router;

$router = new Router();

$router->add('get', '/', Index::class, 'index');
$router->add('get', '/forms', Form::class, 'index');
$router->add('get', '/forms/view', Form::class, 'view');

return $router;