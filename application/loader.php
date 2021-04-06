<?php
    // inicia a sessão caso seja nessesario
    session_start();

if ( !defined('DEBUG') || DEBUG === false ) {
    // Php para de reportar erros
    error_reporting(0);
} else {
    // php reporta todos os erros
    error_reporting(E_ALL);
}

/*Zona de requires*/
require APPLICATIONPATH . '/libraries/autoloader.php';
require APPLICATIONPATH . '/libraries/util.php';
require_once APPLICATIONPATH . '/controllers/HomeController.php';
require_once APPLICATIONPATH . '/controllers/ErrorController.php';
require_once APPLICATIONPATH . '/controllers/LoginController.php';
require_once APPLICATIONPATH . '/controllers/RegisterController.php';
require_once APPLICATIONPATH . '/controllers/AssociacaoController.php';
require_once APPLICATIONPATH . '/controllers/EventoController.php';
require_once APPLICATIONPATH . '/controllers/NoticiaController.php';
require_once APPLICATIONPATH . '/controllers/PessoalController.php';
require_once APPLICATIONPATH . '/pageHandlers/LoginHandler.php';
require_once APPLICATIONPATH . '/pageHandlers/HomeHandler.php';
require_once APPLICATIONPATH . '/pageHandlers/RegisterHandler.php';
require_once APPLICATIONPATH . '/pageHandlers/NoticiaHandler.php';
/*end*/

$app = new Application();
$app->router->get('404', new ErrorController);
$app->router->get('500', new ErrorController);
$app->router->get('/', new HomeController);
$app->router->get('home/', new HomeController);
$app->router->post('home/', new HomeHandler);
$app->router->get('login/', new LoginController);
$app->router->post('login/', new LoginHandler);
$app->router->get('register/', new RegisterController);
$app->router->post('register/', new RegisterHandler);
$app->router->get('associacao/', new AssociacaoController);
$app->router->get('evento/', new EventoController);
$app->router->get('noticia/', new NoticiaController);
$app->router->post('noticia/', new NoticiaHandler);
$app->router->get('pessoal/', new PessoalController);
$app->run();
