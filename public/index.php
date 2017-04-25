<?php

//use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Fin\Application;
use Fin\Plugins\RoutePlugin;
use Fin\Plugins\ViewPlugin;
use Fin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());

$app->get('/quem-somos/{name}/{id}', function(ServerRequestInterface $request){
	$response = new \Zend\Diactoros\Response();
	$response->getBody()->write("Responser com emitter do diactoros");
	return $response;
});

$app->get('/category-costs', function() use($app){
	$view = $app->service('view.renderer');
	return $view->render('category-costs/list.html.twig');
});

$app->start();
//Inicia tudo