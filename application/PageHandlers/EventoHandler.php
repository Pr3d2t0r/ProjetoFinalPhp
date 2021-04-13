<?php


class EventoHandler extends PageHandler{

    public function __construct(){
        $this->model = $this->loadModel('EventoModel');
    }

    public function index(){
        // TODO: Implement index() method.
    }

    public function criar(){
        var_dump($_POST);
        $userId = LoginCore::getUserId();
        if ($userId == false){
            gotoPage('login/?error=af&next=evento/criar/');
            return;
        }
        if (!isset($_POST['assocId'])){
            gotoPage('500/');
            return;
        }
        $assocId = $_POST['assocId'];
        if (!LoginCore::isSuperAdmin($userId) && !$this->model->userIsOnAssociacao($assocId)){
            gotoPage('?error=af');
            return;
        }
        if (!isset($_POST['titulo'])){
            gotoPage('?error=fe');
            return;
        }
        $titulo = $_POST['titulo'];
        if (!isset($_POST['data'])){
            gotoPage('?error=fe');
            return;
        }
        $data = $_POST['data'];
        if (!isset($_POST['conteudo'])){
            gotoPage('?error=fe');
            return;
        }
        $conteudo = $_POST['conteudo'];

        $eventoId = $this->model->insert($titulo, $conteudo, $assocId, $data);
        gotoPage('evento/' . $eventoId);
    }

    public function editar(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $userId = LoginCore::getUserId();
        if ($userId == false){
            gotoPage('login/?error=af&next=evento/criar/');
            return;
        }
        if (!isset($parametros[0])){
            gotoPage('500/');
            return;
        }
        $id = $parametros[0];

        if (!isset($_POST['assocId'])){
            gotoPage('500/');
            return;
        }
        $assocId = $_POST['assocId'];

        if (!LoginCore::isSuperAdmin($userId) && !$this->model->userIsOnAssociacao($assocId)){
            gotoPage('?error=af');
            return;
        }
        if (!isset($_POST['titulo'])){
            gotoPage('?error=fe');
            return;
        }
        $titulo = $_POST['titulo'];

        if (!isset($_POST['data'])){
            gotoPage('?error=fe');
            return;
        }
        $data = $_POST['data'];

        if (!isset($_POST['conteudo'])){
            gotoPage('?error=fe');
            return;
        }
        $conteudo = $_POST['conteudo'];

        $eventoId = $this->model->update($id, $titulo, $conteudo, $data);
        gotoPage('evento/' . $eventoId);
    }

    public function participar(){
        $userId = LoginCore::getUserId();
        if ($userId == false){
            gotoPage('login/?error=af&next=evento/participar/');
            return;
        }
        if (!isset($_POST['eventoId']) || empty($_POST['eventoId'])){
            gotoPage('404/');
            return;
        }
        $eventoId = $_POST['eventoId'];
        if(!$this->model->exists($eventoId)){
            gotoPage('?error=ede');
            return;
        }
        if ($this->model->isInscrito($userId, $eventoId)){
            gotoPage('evento/'.$eventoId.'/?error=ai');
            return;
        }
        if (!$this->model->ableToParticipate($userId, $eventoId) && !LoginCore::isSuperAdmin($userId)){
            gotoPage('?error=af');
            return;
        }
        $this->model->inscreve($userId, $eventoId);
        gotoPage('evento/'.$eventoId.'/?success=8');
    }
}