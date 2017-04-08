<?php

namespace App\Http\Controllers;

use App\TesteBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Resultado as Resultado;
use Mockery\CountValidator\Exception;

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
     * Exibe a página de carregamento do teste
     * @param Request $request
     * @param $guid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loading(Request $request, $guid)
    {
        if (!strpos($request->server('HTTP_REFERER'), $guid)) {
            return redirect("/t/{$guid}");
        }

        return view('teste/loading', [
            'guid' => $guid
        ]);
    }

    /**
     * Realiza o teste
     * @param Request $request
     * @param $guid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function make(Request $request, $guid)
    {
        $userid = $request->session()->get('userid');
        $upload = public_path() . '/upload/';

        $user = DB::table('usuarios')->where('userid', $userid)->first();

        $facebook = new \App\Libraries\FBLibrary($user);
        $instance = load_test($guid);
        $instance->setFacebook($facebook);

        if (!($instance instanceof TesteBase)) {

            return response()->json([
                'status' => false
            ]);

        }

        try {
            $image = $instance->render();
        } catch(Exception $e) {
            die($e->getMessage());
        }

        $hash = md5(uniqid(time()));

        $filename = $hash . '.jpg';

        while (file_exists($upload . $filename)) {
            $hash = md5(uniqid(time()));
            $filename = $hash . '.jpg';
        }

        if ($image instanceof \Intervention\Image\Image) {
            $image->save($upload . $filename);
        }

        $resultado = new Resultado();
        $resultado->userid = $userid;
        $resultado->result = $hash;
        $resultado->save();

        return response()->json([
                'status' => true,
                'hash' => $hash
            ]);
    }

    /**
     * Gera o resultado do teste
     * @param Request $request
     * @param $guid
     * @param $hash
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Request $request, $guid, $hash)
    {
        return view('teste/result', [
            'guid' => $guid,
            'hash' => $hash
        ]);
    }
}
