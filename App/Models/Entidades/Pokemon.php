<?php

namespace App\Models\Entidades;


class Pokemon
{
    private int $id;
    private string $name;
    private string $type_name;

    public function getId () : int {
        return $this->id;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getTypes() : string {
        return $this->type_name;
    }

    public function setTypes(string $type_name) {
        $this->type_name = $type_name;
    }
}