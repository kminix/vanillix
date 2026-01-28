<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Support\Request;
use App\Support\Response;

final class HomeController
{
    public function index(Request $request, array $params = []): Response
    {
        return new Response("Home Great", 200);
    }
}