<?php

namespace App\Models\Entidades;

class Type
{
    private $id;
    private $type_name;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTypeName()
    {
        return $this->type_name;
    }

    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;
    }
}