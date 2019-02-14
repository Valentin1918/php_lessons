<?php
namespace App\Controllers;

use App\View\StringView;

class IndexController
{

    public function index()
    {
        return new StringView("Hi! Index.");
    }

}