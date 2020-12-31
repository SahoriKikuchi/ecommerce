<?php 

session_start();

require_once("vendor/autoload.php"); //traz as dependencias do projeto

use \Slim\Slim; //Namespaces
use \Hcode\Page; //Namespaces
use \Hcode\PageAdmin;
use \Hcode\Model\User;


$app = new Slim(); 

$app->config('debug', true);
// 1º Rota:
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index"); //carrega o conteudo que ta dentro do template index

});

$app->get('/admin', function() {
    
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index"); //carrega o conteudo que ta dentro do template index

});

$app->get('/admin/login', function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function(){

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function(){

	User::logout();

	header("Location: /admin/login");
	exit;
});

$app->run(); // o que faz rodar mesmo

 ?>