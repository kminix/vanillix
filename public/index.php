<?php

declare(strict_types=1);

use App\Support\Request;
use App\Support\Response;
use Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';


$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$debug = $_ENV['APP_DEBUG'] ?? false;

if($debug){
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}else{
    error_reporting(0);
    ini_set('display_errors', '0');
}

$config = require dirname(__DIR__) . '/config/app.php';

session_start();

$request = Request::capture();

$response = new Response(
    'Loaded', 
    200
);

$response->send();