<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\TesteBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Resultado as Resultado;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Models\Teste as Teste;

/**
 * Class TesteController
 * @package App\Http\Controllers
 */
class TesteController extends Controller
{
    use SEOToolsTrait;

    /**
     * Exibe o teste
     * @param $guid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($guid)
    {
        // Busca o teste no banco de dados
        $teste = Teste::where('slug', $guid)->first();

        // Se o teste não existir, redirecione pra home
        if (!$teste) {
            return redirect('/');
        }

        // SEO Tools
        $this->seo()->setTitle($teste->title);
        $this->seo()->setDescription($teste->description);
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addImage($teste->cover);
        //

        // Exibe a página do teste
        return view('teste/index', [
            'id'          => $teste->id,
            'guid'        => $guid,
            'title'       => $teste->title,
            'cover'       => $teste->cover,
            'description' => $teste->description,
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
        $upload = public_path('/r/');

        $user = Usuario::where('userid', $userid)->first();
        $teste = Teste::where('slug', $guid)->first();

        $facebook = new \App\Libraries\FBLibrary($user);

        $instance = load_test($guid, $teste->class);

        if (!($instance instanceof TesteBase)) {

            return response()->json([
                'status' => false
            ]);

        }

        $instance->setFacebook($facebook);

        // Se o teste for único resultado por usuário
        if ($instance->getUnique()) {

            // Busca o resultado anterior
            $resultado = DB::table('resultados')
                ->where('userid', $userid)
                ->where('guid', $guid)
                ->first();

            // Se existir, então retorna ele
            if (!is_null($resultado)) {
                return response()->json([
                    'status' => true,
                    'hash'   => $resultado->result
                ]);
            }
        }

        try {
            $image = $instance->render();
        } catch (\Exception $e) {
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
        $resultado->guid = $guid;
        $resultado->result = $hash;
        $resultado->save();

        return response()->json([
            'status' => true,
            'hash'   => $hash
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
        // Busca o teste no banco de dados
        $teste = Teste::where('slug', $guid)->first();

        // SEO Tools
        $this->seo()->setTitle($teste->title);
        $this->seo()->setDescription($teste->description);
        $this->seo()->opengraph()->setUrl(url('/t/' . $guid));
        $this->seo()->opengraph()->addImage(url('/r/' . $hash . '.jpg'));
        //

        // Se a visita vier do facebook
        if ($request->get('fb')) {

            // Exibe a página do teste
            return view('teste/index', [
                'id'          => $teste->id,
                'guid'        => $guid,
                'title'       => $teste->title,
                'cover'       => $teste->cover,
                'description' => $teste->description,
            ]);
        }

        // Busca o nome do usuário
        list($name) = explode(' ', $request->session()->get('name'));

        // Busca a mensagem final
        $message = $teste->message;

        if (!empty($message)) {
            $message = str_replace('[[nome]]', $name, $message);
        }

        // Caso contrário, mostra o resultado
        return view('teste/result', [
            'id'      => $teste->id,
            'guid'    => $guid,
            'message' => $message,
            'hash'    => $hash
        ]);
    }
}
