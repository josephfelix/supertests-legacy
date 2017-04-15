<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    use SEOToolsTrait;

    /**
     * Carrega a homepage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        // SEO Tools
        $this->seo()->setTitle(env('TITLE'));
        $this->seo()->setDescription('testesweb.com | seu site de testes para o facebook');
        //

        return view('index/index');
    }

    /**
     * Carrega os testes de acordo com o limite
     * @param int $limit
     * @return \Illuminate\Http\JsonResponse
     */
    public function load($limit = 30)
    {
        $testes = Teste::limit($limit)
            ->select('id', 'title', 'cover', 'slug', 'description', 'created_at', 'updated_at')
            ->offset(0)
            ->get();
        return response()->json($testes);
    }
}
