<?php
namespace App\Http;

class Request
{
    public function getQueryParams()
    {
        return $_GET;
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}