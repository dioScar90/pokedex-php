<?php

namespace App\Models\Entidades;

use DateTime;

class Pokedex 
{
    private int $id;
    private string $nome;
    private string $data_cadastro;
    
    public function getId () : int {
        return $this->id;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getDataCadastro() : DateTime {
        return new DateTime($this->data_cadastro);
    }

    public function setDataCadastro(string $data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }
}