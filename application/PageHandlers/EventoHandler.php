<?php


class EventoHandler extends PageHandler{

    public function __construct(){
        $this->model = $this->loadModel('EventoModel');
    }

    public function index(){
        // TODO: Implement index() method.
    }

    public function participar(){
        $userId = LoginCore::getUserId();
        if ($userId == false){
            gotoPage('login/?error=af&next=home/');
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