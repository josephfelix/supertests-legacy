<?php
namespace App;
use App\Libraries\FBLibrary;

/**
 * Class TesteBase
 * @package App
 */
abstract class TesteBase implements TesteInterface
{
    public $titulo = 'Teste sem título';
    public $capa = 'http://placehold.it/800x420';
    public $descricao = '';
    public $mensagem = '';
    public $unico = false;

    /**
     * @var FBLibrary
     */
    public $facebook;

    /**
     * Altera o facebook do usuário que está realizando o teste
     * @param $facebook
     */
    public function setFacebook(FBLibrary $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Busca o título do teste
     * @return string
     */
    public function getTitle()
    {
        return $this->titulo;
    }

    /**
     * Busca a imagem principal do teste
     * @return string
     */
    public function getCover()
    {
        return $this->capa;
    }

    /**
     * Busca a descrição do teste
     * @return string
     */
    public function getDescription()
    {
        return $this->descricao;
    }

    /**
     * Busca se o resultado deve dar o mesmo resultado por pessoa
     * @return bool
     */
    public function getUnique()
    {
        return $this->unico;
    }

    /**
     * Retorna a mensagem final exibida após fazer o teste
     * @return string
     */
    public function getMessage()
    {
        return $this->mensagem;
    }
}