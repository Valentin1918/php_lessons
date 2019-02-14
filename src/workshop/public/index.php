<?php

require __DIR__.'/../bootstrap/bootstrap.php';

//phpinfo();

//p([123, 456]);
//p($_GET);
//p($_SERVER);

$router = require __DIR__.'/../routes/routes.php';
//$router = include __DIR__.'/../routes/routes.php';
$app = new \App\Application($router);
$request = new \App\Http\Request();
$app->handleRequest($request);
//echo $res;

//p($request->getMethod(), $request->getQueryParams());
//p($router);

//echo 'end';
