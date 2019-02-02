<?php

require_once __DIR__.'/vendor/autoload.php';

$user = new \App\User('Vasia');
$employee = new \App\Employee('Petia');
$employee->setRole('PHP developer');
var_dump($user->getName(), $employee->getEmployee());
