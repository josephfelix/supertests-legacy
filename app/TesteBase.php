<?php
namespace App;

/**
 * Class TesteBase
 * @package App
 */
abstract class TesteBase implements TesteInterface
{
    use Traits\FBTrait;

    public $titulo = 'Teste sem título';
    public $capa = 'http://placehold.it/800x420';

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
}