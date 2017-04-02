<?php
namespace App;

/**
 * Class TesteBase
 * @package App
 */
abstract class TesteBase implements TesteInterface
{
    /**
     * Retorna o título do teste
     * @return string
     */
    public function getTitle()
    {
        return 'Teste sem título';
    }

    /**
     * Retorna o cover da imagem
     * @return string
     */
    public function getCover()
    {
        return 'http://placehold.it/800x420';
    }
}