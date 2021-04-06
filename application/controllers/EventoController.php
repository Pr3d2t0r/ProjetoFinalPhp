<?php


class EventoController extends MainController{

    public function __construct(){
        parent::__construct();
        $this->stylesheet="evento.css";
        $this->model = $this->loadModel('AssociacaoModel');
        $this->title="Associacao";
    }

    /**
     * Pagina index
     */
    public function index(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/evento/evento-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }

    public function criar(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        $pagina = $parametros['get']['path'];
        if (!$this->loggedIn){
            gotoPage("login/?error=af&next=$pagina".(($nextPage != null)?"?next=".$nextPage:""));
            return;
        }
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/evento/criar-evento-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }

    public function editar(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        $pagina = $parametros['get']['path'];
        if (!$this->loggedIn){
            gotoPage("login/?error=af&next=$pagina".(($nextPage != null)?$nextPage:""));
            return;
        }
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/evento/editar-evento-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }
}