<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Support\Response;
use app\Support\Request;

final class RatingController
{
    public function index(Request $request, array $args = []){
        return new Response("Rating good too!", 200);
    }
}