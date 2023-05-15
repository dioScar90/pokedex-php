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
            // $sql = "SELECT * FROM pokemon";
            $sql = "SELECT
                        P.id
                        ,P.name
                        # ,T.type_name
                        ,GROUP_CONCAT(T.type_name ORDER BY P.id SEPARATOR ' | ') AS type_name
                    FROM pokemon P
                    INNER JOIN pokemons_types PT ON P.id = PT.pokemon_id
                    INNER JOIN type T ON PT.type_id = T.id
                    GROUP BY id, name
                    LIMIT 50";
            
            $resultado = $this->select($sql);
            
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