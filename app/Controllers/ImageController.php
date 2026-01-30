<?php
declare(strict_types=1);
namespace App\Controllers;

use App\Support\Request;
use App\Support\Response;
use App\Support\View;
final class ImageController
{

    public function index(Request $requst, array $params = []): Response
    {
        //build the html:
        $images = [
            ['id' => 1, 'title' => '#1', 'avg' => 4.7 , 'user_rating' => 0],
            ['id' => 2, 'title' => '#2', 'avg' => 2.6 , 'user_rating' => 0],
            ['id' => 3, 'title' => '#3', 'avg' => 1.5 , 'user_rating' => 0],
        ];
        $html = View::render('images.index', [
            'ttile' => 'Images Page',
            'images' => $images,
            'message' => 'congratulations idiot',
        ]);
        return Response::html($html);
    }

}