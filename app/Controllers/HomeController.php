<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Support\Request;
use App\Support\Response;
use App\Support\View;
final class HomeController
{
    public function index(Request $request, array $params = []): Response
    {

        $html = View::render('home.index', [
            'title' => 'Home',
            'heading' => 'Home',
            'message' => 'Views are wired up'
        ]);
        return  Response::html($html);
    }
}