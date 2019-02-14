<?php
namespace App\Controllers;

use App\View\StringView;

class FormController
{
    public function view($params)
    {
        return new StringView('Forms view '.$params['id']);
    }
    public function index()
    {
        return new StringView('Forms index');
    }
    public function update()
    {
        //
    }
    public function delete($id)
    {
        //
    }

}