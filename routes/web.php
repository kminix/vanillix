<?php
declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Controller\ImageController;
use App\Controller\RatingController;


/** @var \App|Routing\Router $router */

//GETS
$router->get('/', [HomeController::class, 'index']);
$router->get('/images', [ImageController::class, 'index']);
$router->get('images/{id}', [ImageController::class], 'show');
//POSTS;
$router->post('images', [ImageController::class, 'upload']);
$router->post('ratings', [RatingController::class], 'store');