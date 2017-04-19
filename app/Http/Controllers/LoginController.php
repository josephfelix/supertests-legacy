<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use Illuminate\Http\Request as Request;
use Facebook\Facebook as Facebook;
use Facebook\Exceptions\FacebookResponseException as FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException as FacebookSDKException;
use Illuminate\Support\Facades\Input as Input;
use App\Models\Usuario as Usuario;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * Realiza o login do usuário
     * @param Request $request
     * @return string
     */
    public function login(Request $request)
    {
        $post = (object)Input::all();

        $fb = new Facebook([
            'app_id'                => env('FB_APP_ID'),
            'app_secret'            => env('FB_APP_SECRET'),
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getJavaScriptHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (FacebookResponseException $e) {

            return response()->json([
                'status'  => false,
                'result'  => 'Ocorreu um erro ao fazer login no facebook, código do erro: ' . $e->getCode(),
                'message' => $e->getMessage()
            ]);

        } catch (FacebookSDKException $e) {

            return response()->json([
                'status'  => false,
                'result'  => 'Ocorreu um erro ao fazer login no facebook, código do erro: ' . $e->getCode(),
                'message' => $e->getMessage()
            ]);

        }

        if (!isset($accessToken)) {

            return response()->json([
                'status' => false,
                'result' => 'Ocorreu um erro ao fazer login no facebook, tente fazer login novamente. '
            ]);

        }

        $usuario = Usuario::firstOrNew(['userid' => $post->id]);
        $usuario->name = $post->name;
        $usuario->email = $post->id . '@testesweb.com';

        if (isset($post->email)) {
            $usuario->email = $post->email;
        }

        if (isset($post->gender)) {
            $usuario->gender = $post->gender;
        }

        if (isset($post->birthday)) {
            $usuario->birthday = $post->birthday;
        }

        if (isset($post->cover)) {
            $usuario->cover = $post->cover['source'];
        }

        if (isset($post->age_range)) {
            $usuario->age = $post->age_range['min'];
        }

        if (isset($post->favorite_athletes)) {
            $usuario->favorite_athletes = json_encode($post->favorite_athletes);
        }

        if (isset($post->favorite_teams)) {
            $usuario->favorite_teams = json_encode($post->favorite_teams);
        }

        try {
            $usuario->save();
        } catch (\Exception $e) {

        }

        $request->session()->put([
            'logged'          => true,
            'userid'          => $post->id,
            'name'            => $post->name,
            'fb_access_token' => (string)$accessToken
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    /**
     * Realiza o logout do usuário
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        if ($request->session()->exists('logged')) {
            $request->session()->flush();
        }
        return redirect('/');
    }
}