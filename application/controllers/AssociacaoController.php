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
        $this->permission_required = 'Gerir-associcao';
    }

    /**
     * Pagina index
     */
    public function index(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        $pagina = $parametros['get']['path'];
        if (!$this->loggedIn){
            gotoPage("login/?error=af&next=$pagina".(($nextPage != null)?'?next='.$nextPage:""));
            return;
        }
        if (!isset($parametros[0])){
            include_once APPLICATIONPATH.'/views/includes/header.php';
            include_once APPLICATIONPATH.'/views/includes/menu.php';
            include_once APPLICATIONPATH.'/views/includes/404.php';
            include_once APPLICATIONPATH.'/views/includes/footer.php';
            return;
        }
        $assocId = $parametros[0];
        $assoc = $this->model->getAssociacaoInfo($assocId);
        if ($assoc === false){
            include_once APPLICATIONPATH.'/views/includes/header.php';
            include_once APPLICATIONPATH.'/views/includes/menu.php';
            include_once APPLICATIONPATH.'/views/includes/404.php';
            include_once APPLICATIONPATH.'/views/includes/footer.php';
            return;
        }
        if (!$this->model->userIsOnAssociacao($assocId) && !in_array('Superadmin', $this->userInfo->permissions)){
            gotoPage("?error=af");
            return;
        }
        $socios = "<p>Esta Associação ainda não tem membros!</p>";
        if (count($assoc->socios)>0) {
            $socios = iterate($assoc->socios, function ($el) {
                $nome = $el->nome;
                $email = $el->email;
                $username = $el->username;
                return <<<HTML
                            <article>
                                <div class="body">
                                    <div>
                                        <img src="https://picsum.photos/100/100" alt="">
                                    </div>
                                    <div>
                                        <h2>$nome</h2>
                                        <p>Email: <strong>$email</strong></p>
                                        <p>Username: <strong>$username</strong></p>
                                    </div>
                                </div>
                            </article>
                        HTML;
            });
            $socios = implode(" ", $socios);
        }
        $adm = $this->hasPermissions($this->permission_required, $this->userInfo->permissions);
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/associacao/associacao-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }

    public function all(){
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        $pagina = $parametros['get']['path'];
        if (!$this->loggedIn){
            gotoPage("login/?error=af&next=$pagina".(($nextPage != null)?'?next='.$nextPage:""));
            return;
        }
        $assocsArr = $this->model->getAll();
        if (!$this->hasPermissions('Superadmin', $this->userInfo->permissions)){
            gotoPage("?error=af");
            return;
        }
        $assocs = "<p>Ainda não existem associações!</p>";
        if (count($assocsArr)>0) {
            $assocs = iterate($assocsArr, function ($el) {
                $nome = $el->nome;
                $morada = $el->morada;
                $telefone = $el->telefone;
                $nContribuinte = $el->nContribuinte;
                $editar = HOME_URI . 'associacao/editar/'.$el->id;
                $del = HOME_URI . 'associacao/apagar/'.$el->id;
                $home = HOME_URI . 'associacao/'.$el->id;

                return <<<HTML
                            <article>
                                <div class="body">
                                    <div>
                                        <img src="https://picsum.photos/100/100" alt="">
                                    </div>
                                    <div>
                                        <h2>$nome</h2>
                                        <p>Morada: <strong>$morada</strong></p>
                                        <p>Telefone: <strong>$telefone</strong></p>
                                        <p>Nº contribuinte: <strong>$nContribuinte</strong></p>
                                        <p><a href="$home">Ver Mais</a> | <a href="$editar">Editar</a> | <a href="$del">Apagar</a></p>
                                    </div>                            
                                </div>
                            </article>
                        HTML;
            });
            $assocs = implode(" ", $assocs);
        }
        $adm = $this->hasPermissions($this->permission_required, $this->userInfo->permissions);
        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/associacao/associacao-all-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }
}