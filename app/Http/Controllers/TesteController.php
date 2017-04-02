<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

class TesteController extends Controller
{
    public function show($guid)
    {
        $instance = load_test($guid);

        return view('teste/index', ['guid' => $instance->render()]);
    }

    public function result()
    {
        $img = Image::canvas(800, 600);

        // create a new empty image resource with red background
        $img = Image::canvas(32, 32, '#ff0000');

        return $img->response('jpg');
    }
}
