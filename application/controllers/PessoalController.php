<?php


class PessoalController extends MainController{

    public function __construct(){
        parent::__construct();
        $this->stylesheet="pessoal.css";
        $this->model = $this->loadModel('UserModel');
        $this->script = "pessoal.js";
    }

    public function index(){
        if (!$this->loggedIn){
            gotoPage('home/?error=af');
            return;
        }
        $superAdm = $this->hasPermissions('Superadmin', $this->userInfo->permissions);
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : [];
        $nextPage = null;
        if (isset($parametros['get']['next']))
            $nextPage = $parametros['get']['next'];
        $pageNum = $parametros['get']['page'] ?? 3;
        $eventos = $this->model->getUserEventos($this->userInfo->id);
        $noticias = $this->model->getUserNoticiasGostadas($this->userInfo->id);
        $quotas = $this->model->getUserQuotas($this->userInfo->id);
        if ($this->hasPermissions('admin')){
            // todo
        }
        if ($superAdm){
            $eventos = $this->model->getAllEventos(false);
            $quotas = $this->model->getAllQuotas();
            $noticias = $this->model->getAllNoticias();
            $socios = $this->model->getAll();
            $sociosPaginator = (new Paginator($socios, 2, page: $pageNum))->prepare()->use();
            $socios = $sociosPaginator->itens;
            $sociosHTML = iterate($socios, function ($el) {
                $nome = $el->nome;
                $email = $el->email;
                $username = $el->username;
                $permissions = implode( ', ', $el->permissions);
                $assocNome = $el->associacaoNome;
                $id = $el->id;
                return <<<HTML
                            <div class="grid quota-card">
                                <div class="info">
                                    <p>Nome: $nome</p>
                                    <p>Email: $email</p>
                                    <p>Username: $username</p>
                                    <p>Permissões: $permissions</p>
                                    <p>Associação: $assocNome</p>
                                </div>
                                <div class="action">
                                    <form action="">
                                        <input type="hidden" name="userId" value="$id">
                                        <input type="submit" value="Enviar email">
                                    </form>
                                </div>
                            </div>
                    HTML;
            });
            $sociosHTML = implode(' ', $sociosHTML);
        }
        $noticiasPaginator = (new Paginator($noticias, 2, page: $pageNum))->prepare()->use();
        $eventosPaginator = (new Paginator($eventos, 2, page: $pageNum))->prepare()->use();
        $quotasPaginator = (new Paginator($quotas, page: $pageNum))->prepare()->use();
        $noticias = $noticiasPaginator->itens;
        $eventos = $eventosPaginator->itens;
        $quotas = $quotasPaginator->itens;

        $eventosHTML = "<p>Este user ainda não participou em nenhum evento!</p>";
        if (count($eventos)>0){
            $eventosHTML = iterate($eventos, function ($el){
                $titulo = $el->titulo;
                $conteudo = $el->conteudo;
                $data = $el->data;
                return <<<HTML
                            <div class="evento-card">
                                <p>$titulo</p>
                                <p>$conteudo</p>
                                <p>$data</p>
                            </div>
                    HTML;
            });
            $eventosHTML = implode(' ', $eventosHTML);
        }
        $noticiasHTML = "<p>Este user ainda não gostou de nenhuma noticia!</p>";
        if (count($noticias)>0){
            $noticiasHTML = iterate($noticias, function ($el){
                $titulo = $el->titulo;
                $conteudo = $el->conteudo;
                $path = $el->caminhoImg;
                return <<<HTML
                            <div class="evento-card">
                                <div class="grid">
                                    <div>
                                        <img src="$path" alt="" style="height: 120px;width: auto;">
                                    </div>
                                    <div>
                                        <p>$titulo</p>
                                        <p>$conteudo</p>
                                    </div>
                                </div>
                            </div>
                    HTML;
            });
            $noticiasHTML = implode(' ', $noticiasHTML);
        }
        $quotasHTML = "<p>Este user não tem nenhuma quota pendente!</p>";
        if (count($quotas)>0) {
            $quotasHTML = iterate($quotas, function ($el) {
                $dComeco = $el->dataComeco;
                $dFim = $el->dataTermino;
                $preco = $el->preco;
                $id = $el->id;
                $path = HOME_URI . 'quota/pagar/';
                return <<<HTML
                            <div class="grid quota-card">
                                <div class="info">
                                    <p>Data de começo: $dComeco</p>
                                    <p>Data de termino: $dFim</p>
                                    <p>Preço: $preco</p>
                                </div>
                                <div class="action">
                                    <form action="$path" method="post">
                                        <input type="hidden" name="quotaId" value="$id">
                                        <input type="submit" value="Pagar">
                                    </form>
                                </div>
                            </div>
                    HTML;
            });
            $quotasHTML = implode(' ', $quotasHTML);
        }

        include_once APPLICATIONPATH.'/views/includes/header.php';
        include_once APPLICATIONPATH.'/views/includes/menu.php';
        include_once APPLICATIONPATH.'/views/pessoal/pessoal-view.php';
        include_once APPLICATIONPATH.'/views/includes/footer.php';
    }
}