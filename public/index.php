<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Fin\Application;
use Fin\Plugins\RoutePlugin;
use Fin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new \Fin\Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(RequestInterface $request){
	var_dump($request->getUri());die;
	echo "Hello Word!!";
});

$app->get('/quem-somos/{name}/{id}', function(ServerRequestInterface $request){
	echo "Quem Somos!!";
	echo "<br>";
	echo $request->getAttribute('name');
	echo "<br>";
	echo $request->getAttribute('id');
});

$app->start();