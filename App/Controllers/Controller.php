<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller
{
    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
    }

    public function render($view)
    {
        $viewVar = $this->getViewVar();
        $Sessao  = Sessao::class;

        if ($view == "/pokemon/index") {
            require_once PATH . '/App/Views/layouts/pokeheader.php';
            require_once PATH . '/App/Views/layouts/pokemenu.php';
            require_once PATH . '/App/Views/' . $view . '.php';
            require_once PATH . '/App/Views/layouts/pokefooter.php';
            return;
        }

        require_once PATH . '/App/Views/layouts/header.php';
        require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php';
    }

    public function redirect($view)
    {
        header('Location: http://' . APP_HOST . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }
}