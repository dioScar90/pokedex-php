<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PokemonDAO;
use App\Models\Entidades\Pokemon;
use App\Models\Validacao\PokemonValidator;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemonDAO = new PokemonDAO();

        self::setViewParam('listaPokemons', $pokemonDAO->listar());

        $this->render('/pokemon/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/pokemon/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $pokemon = new Pokemon();
        $pokemon->setName($_POST['name']);

        Sessao::gravaFormulario($_POST);

        $pokemonValidador = new PokemonValidator();
        $resultadoValidacao = $pokemonValidador->validar($pokemon);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/pokemon/cadastro');
        }

        $pokemonDAO = new PokemonDAO();

        $pokemonDAO->salvar($pokemon);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/pokemon');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $pokemonDAO = new PokemonDAO();

        $pokemon = $pokemonDAO->listar($id);

        if(!$pokemon){
            Sessao::gravaMensagem("Pokemon inexistente");
            $this->redirect('/pokemon');
        }

        self::setViewParam('pokemon',$pokemon);

        $this->render('/pokemon/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $pokemon = new Pokemon();
        $pokemon->setId($_POST['id']);
        $pokemon->setName($_POST['name']);

        Sessao::gravaFormulario($_POST);

        $pokemonValidador = new PokemonValidator();
        $resultadoValidacao = $pokemonValidador->validar($pokemon);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/pokemon/edicao/'.$_POST['id']);
        }

        $pokemonDAO = new PokemonDAO();

        $pokemonDAO->atualizar($pokemon);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/pokemon');
    }

    public function exclusao($params)
    {
        $id = $params[0];

        $pokemonDAO = new PokemonDAO();

        $pokemon = $pokemonDAO->listar($id);

        if(!$pokemon){
            Sessao::gravaMensagem("Pokemon inexistente");
            $this->redirect('/pokemon');
        }

        self::setViewParam('pokemon',$pokemon);

        $this->render('/pokemon/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $pokemon = new Pokemon();
        $pokemon->setId($_POST['id']);

        $pokemonDAO = new PokemonDAO();

        if(!$pokemonDAO->excluir($pokemon->getId())){
            Sessao::gravaMensagem("Pokemon inexistente");
            $this->redirect('/pokemon');
        }

        Sessao::gravaMensagem("Pokemon excluido com sucesso!");

        $this->redirect('/pokemon');
    }
}