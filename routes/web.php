<?php
declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Controllers\ImageController;
use App\Controllers\RatingController;


/** @var \App|Routing\Router $router */

//GETS
$router->get('/', [HomeController::class, 'index']);
$router->get('/images', [ImageController::class, 'index']);
$router->get('/images/{id}', [ImageController::class], 'show');
$router->get('/ratings', [RatingController::class, 'index']);
//POSTS;
$router->post('images', [ImageController::class, 'upload']);
$router->post('ratings', [RatingController::class], 'store');
