<?php

use Psr\Http\Message\ServerRequestInterface;
use Fin\Application;
use Fin\Plugins\AuthPlugin;
use Fin\Plugins\DbPlugin;
use Fin\Plugins\RoutePlugin;
use Fin\Plugins\ViewPlugin;
use Fin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

if(file_exists(__DIR__ .'/../.env')) {
    $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->overload();
}


require_once __DIR__ . '/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});

require_once __DIR__ . '/../src/controllers/charts.php';
require_once __DIR__ . '/../src/controllers/statements.php';
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/bill-receives.php';
require_once __DIR__ . '/../src/controllers/bill-pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';



$app->start();