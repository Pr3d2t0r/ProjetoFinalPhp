<?php


class HomeController extends MainController{
    public function __construct(){
        parent::__construct();
        $this->stylesheet = "home.css";
    }
    public function index(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        if (!$this->loggedIn){
            gotoPage('login/?error=af&next=home/');
            return;
        }
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/home/home-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }
}