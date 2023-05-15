<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Pokemon;

class PokemonValidator {

    public function validar(Pokemon $pokemon)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($pokemon->getName()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}