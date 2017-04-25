<?php

use Psr\Http\Message\ServerRequestInterface;
use Fin\Application;
use Fin\Plugins\DbPlugin;
use Fin\Plugins\RoutePlugin;
use Fin\Plugins\ViewPlugin;
use Fin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());


$app->get('/quem-somos/{name}/{id}', function(ServerRequestInterface $request){
	$response = new \Zend\Diactoros\Response();
	$response->getBody()->write("Responser com emitter do diactoros");
	return $response;
});

require_once __DIR__ . '/../src/controllers/category-costs.php';


$app->start();
//Inicia tudo