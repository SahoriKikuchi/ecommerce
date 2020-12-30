<?php 

require_once("vendor/autoload.php"); //traz as dependencias do projeto

use \Slim\Slim; //Namespaces
use \Hcode\Page; //Namespaces
use \Hcode\PageAdmin;

$app = new Slim(); 

$app->config('debug', true);
// 1º Rota:
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index"); //carrega o conteudo que ta dentro do template index

});

$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index"); //carrega o conteudo que ta dentro do template index

});

$app->run(); // o que faz rodar mesmo

 ?>