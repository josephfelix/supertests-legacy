<?php
namespace App\Libraries;

/**
 * Class FBLibrary
 * @package App\Libraries
 */
class FBLibrary
{
    /**
     * @var
     */
    public $_response;

    /**s
     * FBLibrary constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->_response = $user;
    }

    /**
     * Seta o usuário logado
     * @param $user
     */
    public function setUser($user)
    {
        $this->_response = $user;
    }

    /**
     * Busca o nome do usuário
     * @return string
     */
    public function nome()
    {
        list($nome) = explode(' ', $this->_response->name);
        return $nome;
    }

    /**
     * Busca o sobrenome do usuário
     * @return string
     */
    public function sobrenome()
    {
        list(,$sobrenome) = explode(' ', $this->_response->name);
        return $sobrenome;
    }

    /**
     * Busca o nome completo do usuário
     * @return string
     */
    public function nome_completo()
    {
        return $this->_response->name;
    }

    /**
     * Busca a foto do usuário
     * @return string
     */
    public function foto()
    {
        return 'http://graph.facebook.com/' . $this->_response->userid . '/picture?type=large';
    }

    /**
     * Busca o sexo do usuário
     * @return string
     */
    public function sexo()
    {
        return $this->_response->gender;
    }

    /**
     * Busca o e-mail do usuário
     * @return string
     */
    public function email()
    {
        return $this->_response->email;
    }

    /**
     * Busca a data de nascimento do usuário
     * @return array
     */
    public function nascimento()
    {
        list($mes, $dia, $ano) = explode('/', $this->_response->birthday);
        return ['dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'formatado' => "{$dia}/{$mes}/{$ano}"];
    }

    /**
     * Busca a capa do usuário
     * @return string
     */
    public function capa()
    {
        return $this->_response->cover->source;
    }

    /**
     * Busca os atletas favoritos do usuário
     * @return array
     */
    public function atletas_favoritos()
    {
        $result = [];

        $this->_response->favorite_athletes = json_decode($this->_response->favorite_athletes);
        foreach ($this->_response->favorite_athletes as $atleta) {
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
        $result = [];

        $this->_response->favorite_teams = json_decode($this->_response->favorite_teams);
        foreach ($this->_response->favorite_teams as $time) {
            $result[] = [
                'id' => $time->id,
                'foto' => 'http://graph.facebook.com/' . $time->id . '/picture',
                'nome' => $time->name
            ];
        }

        return $result;
    }
}