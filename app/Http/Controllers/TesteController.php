<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class TesteController
 * @package App\Http\Controllers
 */
class TesteController extends Controller
{
    /**
     * Exibe o teste
     * @param $guid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($guid)
    {
        $instance = load_test($guid);

        $cover = $instance->getCover();
        $title = $instance->getTitle();

        if (!filter_var($cover, FILTER_VALIDATE_URL)) {
            $cover = asset('upload/' . $cover);
        }

        return view('teste/index', [
            'title' => $title,
            'cover' => $cover,
        ]);
    }

    /**
     * Gera o resultado do teste
     * @return mixed
     */
    public function result()
    {
        $img = Image::canvas(800, 600);

        // create a new empty image resource with red background
        $img = Image::canvas(32, 32, '#ff0000');

        return $img->response('jpg');
    }
}
