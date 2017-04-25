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

$app->get('/{name}', function(ServerRequestInterface $request) use($app)
{
	$view = $app->service('view.renderer');
	return $view->render('teste.html.twig', ['name'=> $request->getAttribute('name')]);
});

$app->get('/quem-somos/{name}/{id}', function(ServerRequestInterface $request){
	$response = new \Zend\Diactoros\Response();
	$response->getBody()->write("Responser com emitter do doactoros");
	return $response;
});

$app->start();
//Inicia tudo