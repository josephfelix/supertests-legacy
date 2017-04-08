<?php
namespace App\Traits;

/**
 * Class FBTrait
 * @package App\Traits
 */
trait FBTrait
{
    /**
     * Busca o nome do usuário
     * @return mixed
     */
    public function nome()
    {
        global $RESPONSE;
        return $RESPONSE->name;
    }

    /**
     * Busca a foto do usuário
     * @return string
     */
    public function foto()
    {
        global $RESPONSE;
        return 'http://graph.facebook.com/' . $RESPONSE->id . '/picture';
    }

    /**
     * Busca o sexo do usuário
     * @return string
     */
    public function sexo()
    {
        global $RESPONSE;
        return $RESPONSE->gender;
    }

    /**
     * Busca o e-mail do usuário
     * @return string
     */
    public function email()
    {
        global $RESPONSE;
        return $RESPONSE->email;
    }

    /**
     * Busca a data de nascimento do usuário
     * @return array
     */
    public function nascimento()
    {
        global $RESPONSE;
        list($mes, $dia, $ano) = explode('/', $RESPONSE->birthday);
        return ['dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'formatado' => "{$dia}/{$mes}/{$ano}"];
    }

    /**
     * Busca a capa do usuário
     * @return string
     */
    public function capa()
    {
        global $RESPONSE;
        return $RESPONSE->cover->source;
    }

    /**
     * Busca os atletas favoritos do usuário
     * @return array
     */
    public function atletas_favoritos()
    {
        global $RESPONSE;
        $result = [];

        foreach ($RESPONSE->favorite_athletes as $atleta) {
            $result[] = [
                'id' => $atleta->id,
                'foto' => 'http://graph.facebook.com/' . $atleta->id . '/picture',
                'nome' => $atleta->name
            ];
        }

        return $result;
    }

    /**
     * Busca os times favoritos do usuário
     * @return array
     */
    public function times_favoritos()
    {
        global $RESPONSE;
        $result = [];

        foreach ($RESPONSE->favorite_teams as $time) {
            $result[] = [
                'id' => $time->id,
                'foto' => 'http://graph.facebook.com/' . $time->id . '/picture',
                'nome' => $time->name
            ];
        }

        return $result;
    }
}