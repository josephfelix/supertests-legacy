<?php

namespace App\Http\Controllers;

use App\Libraries\FBLibrary as FBLibrary;
use App\TesteBase as TesteBase;
use Illuminate\Support\Facades\Response as Response;

set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'Off');
ini_set('memory_limit', '1g');

/**
 * Class DebugController
 * @package App\Http\Controllers
 */
class DebugController extends Controller
{
    /**
     * Renderiza a página de debug
     * @param $guid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($guid)
    {
        return view('debug.index', ['guid' => $guid]);
    }

    /**
     * Renderiza a imagem para validar o teste
     * @param $guid
     * @return mixed
     */
    public function image($guid)
    {
        $_directory = app_path('Testes');
        $_testfile = $_directory . DIRECTORY_SEPARATOR . $guid . '.php';

        if (!file_exists($_testfile)) {
            return redirect('/');
        }

        $instance = null;

        try {
            include_once $_testfile;
            $classes = get_declared_classes();
            $class = end($classes);
            $instance = new $class;
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if ($instance === null) {
            die('Instancia não encontrada, verifique o nome do teste.');
        }

        if (!($instance instanceof TesteBase)) {
            die('A instância do teste deve extender para TesteBase.');
        }

        $user = new \stdClass();
        $user->id = 1;
        $user->userid = '100000338520422';
        $user->name = 'Joseph Felix';
        $user->email = 'joseph0xfff@gmail.com';
        $user->gender = 'male';
        $user->birthday = '04/02/1994';
        $user->cover = 'https://scontent.xx.fbcdn.net/v/t31.0-8/s720x720/16797665_1385412144813390_2905649346573155634_o.jpg?oh=cda101f28263c0f285263b18f7ac153e&oe=59837AD8';
        $user->favorite_athletes = '[{"id":"254448564717189","name":"Daniel \\"Kowuzo\\" Chami"},{"id":"289579904475528","name":"KamiKat"},{"id":"706706822675438","name":"Jean \\" Yu \\" Escarabello"},{"id":"257692544257830","name":"Diogo Silva"}]';
        $user->favorite_teams = '[{"id":"5985827589","name":"Fnatic"},{"id":"193628340649726","name":"Pain Gaming"}]';

        $facebook = new FBLibrary($user);
        $instance->setFacebook($facebook);

        try {
            $image = $instance->render();
        } catch (\Exception $e) {
            die($e->getTraceAsString());
        }

        if (!($image instanceof \Intervention\Image\Image)) {
            die('$image precisa ser uma instância de \Intervention\Image\Image');
        }

        $response = Response::make($image->encode('jpeg'));
        $response->header('Content-Type','image/jpeg');
        return $response;
    }
}
