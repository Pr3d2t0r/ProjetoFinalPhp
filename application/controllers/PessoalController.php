<?php


class PessoalController extends MainController{

    public function __construct(){
        parent::__construct();
        $this->stylesheet="pessoal.css";
    }

    public function index(){
        if (!$this->loggedIn){
            gotoPage('home/?error=af');
            return;
        }
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/pessoal/pessoal-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';

    }
}