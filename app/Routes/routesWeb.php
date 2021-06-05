<?php

use App\Routes\Router;
use App\Controllers\ApiController;
use App\Controllers\BlogController;

$router = new Router($_GET['url']);

// $router->get('/', 'App\Controllers\BlogController@welcome');
// $router->get('/posts', 'App\Controllers\BlogController@index');
// $router->get('/posts/:id', 'App\Controllers\BlogController@show');

$router->get('/', [BlogController::class, 'welcome']);
$router->get('/posts', [BlogController::class, 'index']);
$router->get('/posts/:id', [BlogController::class, 'show']);
$router->get('/hello', [BlogController::class, 'hello']);

$router->get('/api/posts', [ApiController::class, 'index']);


$router->run();