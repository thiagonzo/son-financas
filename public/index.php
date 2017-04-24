<?php

use Fin\Application;
use Fin\Plugins\RoutePlugin;
use Fin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new \Fin\Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(){
	echo "Hello Word!!";
});

$app->get('/quem-somos', function(){
	echo "Quem Somos!!";
});

$app->start();