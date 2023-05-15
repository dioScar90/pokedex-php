<?php

namespace App\Models\DAO;

use App\Models\Entidades\Fornecedor;
use Exception;

class FornecedorDAO extends BaseDAO 
{
    public function listar ($id = null)
    {
        if ($id) {
            $resultado = $this->select("SELECT * FROM fornecedor WHERE id = $id");

            return $resultado->fetchObject(Fornecedor::class);
        } else {
            $resultado = $this->select("SELECT * FROM fornecedor");
            
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Fornecedor::class);
        }

        return false;
    }

    public function salvar (Fornecedor $fornecedor)
    {
        try {

            $nome = $fornecedor->getNome();

            return $this->insert('fornecedor', ":nome", [':nome'=>$nome]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados.", 500);
        }
    }

    public function atualizar (Fornecedor $fornecedor)
    {
        try {

            $id = $fornecedor->getId();
            $nome = $fornecedor->getNome();

            return $this->update('fornecedor', 
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

            return $this->delete('fornecedor', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o fornecedor.", 500);
        }
    }
}