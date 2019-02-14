<?php
namespace App\Http;

interface RouteInterface
{
   public function __construct(string $className, string $action);
   public function getClassName() : string;
   public function getAction() : string;
}
