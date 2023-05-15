<?php

namespace App\Models\DAO;

use App\Models\Entidades\Pokemon;
use Exception;

class PokemonDAO extends BaseDAO 
{
    public function listar ($id = null)
    {
        if ($id) {
            $resultado = $this->select("SELECT * FROM pokemon WHERE id = $id");

            return $resultado->fetchObject(Pokemon::class);
        } else {
            $resultado = $this->select("SELECT * FROM pokemon");
            
            return $resultado->fetchAll(\PDO::FETCH_CLASS, pokemon::class);
        }

        return false;
    }

    public function salvar (Pokemon $pokemon)
    {
        try {

            $nome = $pokemon->getName();

            return $this->insert('pokemon', ":nome", [':nome'=>$nome]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados.", 500);
        }
    }

    public function atualizar (Pokemon $pokemon)
    {
        try {

            $id = $pokemon->getId();
            $nome = $pokemon->getName();

            return $this->update('pokemon', 
                                "nome = :nome", 
                                [':id'=>$id, ':nome'=>$nome], 
                                "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados.", 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('pokemon', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o pokemon.", 500);
        }
    }
}