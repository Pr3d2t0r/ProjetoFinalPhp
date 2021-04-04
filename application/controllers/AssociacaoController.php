<?php


/**
 * Class AssociacaoController
 * @author Rafael Velosa
 */
class AssociacaoController extends MainController{

    public function __construct(){
        parent::__construct();
        $this->stylesheet="associacao.css";
        $this->model = $this->loadModel('AssociacaoModel');
        $this->title="Associacao";
    }

    /**
     * Pagina index
     */
    public function index(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/associacao/associacao-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }
}