<?php

//use Psr\Http\Message\RequestInterface;
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

$app
	->get('/category-costs', function() use($app){
		$view = $app->service('view.renderer');
		$meuModel = new \Fin\Models\CategoryCost();
		$categories = $meuModel->all();
		return $view->render('category-costs/list.html.twig', [
			'categories' => $categories
		]);
	})
	->get('/category-costs/new', function() use($app){
		$view = $app->service('view.renderer');
		return $view->render('category-costs/create.html.twig');
	})
	->post('/category-costs/store', function (ServerRequestInterface $request){
		//cadastro de category
		$data = $request->getParsedBody();
		\Fin\Models\CategoryCost::create($data);
		return new \Zend\Diactoros\Response\RedirectResponse('/category-costs');
	});

$app->start();
//Inicia tudo