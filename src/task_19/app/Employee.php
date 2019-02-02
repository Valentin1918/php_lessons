<?php
namespace App;
class Employee extends User
{
    protected $role;

    public function getEmployee()
    {
        $name = isset($this->name) ? $this->name : 'Incognito';
        return $name.' is '.$this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}