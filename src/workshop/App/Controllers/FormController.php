<?php
namespace App\Controllers;

class FormController
{
    public function view($params)
    {
        echo 'Forms view '.$params['id'];
    }
    public function index()
    {
        echo 'Forms index';
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