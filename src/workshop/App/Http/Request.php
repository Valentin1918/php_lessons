<?php
namespace App\Http;

class Request implements RequestInterface
{
    public function getQueryParams()
    {
        return $_GET;
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath()
    {
        $parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        return $parts[0];
    }
}