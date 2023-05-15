<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\FornecedorDAO;
use App\Models\Entidades\Fornecedor;
use App\Models\Validacao\FornecedorValidador;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedorDAO = new FornecedorDAO();

        self::setViewParam('listaFornecedores', $fornecedorDAO->listar());

        $this->render('/fornecedor/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/fornecedor/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setNome($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $fornecedorValidador = new FornecedorValidador();
        $resultadoValidacao = $fornecedorValidador->validar($fornecedor);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/fornecedor/cadastro');
        }

        $fornecedorDAO = new FornecedorDAO();

        $fornecedorDAO->salvar($fornecedor);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/fornecedor');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $fornecedorDAO = new FornecedorDAO();

        $fornecedor = $fornecedorDAO->listar($id);

        if(!$fornecedor){
            Sessao::gravaMensagem("Fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        self::setViewParam('fornecedor',$fornecedor);

        $this->render('/fornecedor/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setId($_POST['id']);
        $fornecedor->setNome($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $fornecedorValidador = new FornecedorValidador();
        $resultadoValidacao = $fornecedorValidador->validar($fornecedor);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/fornecedor/edicao/'.$_POST['id']);
        }

        $fornecedorDAO = new FornecedorDAO();

        $fornecedorDAO->atualizar($fornecedor);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/fornecedor');
    }

    public function exclusao($params)
    {
        $id = $params[0];

        $fornecedorDAO = new FornecedorDAO();

        $fornecedor = $fornecedorDAO->listar($id);

        if(!$fornecedor){
            Sessao::gravaMensagem("Fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        self::setViewParam('fornecedor',$fornecedor);

        $this->render('/fornecedor/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setId($_POST['id']);

        $fornecedorDAO = new FornecedorDAO();

        if(!$fornecedorDAO->excluir($fornecedor->getId())){
            Sessao::gravaMensagem("Fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        Sessao::gravaMensagem("Fornecedor excluido com sucesso!");

        $this->redirect('/fornecedor');
    }
}