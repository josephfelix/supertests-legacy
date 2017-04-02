<?php
namespace App\Testes;
use App\TesteBase;

class CoelhoPascoa extends TesteBase
{
    /**
     * Retorna a imagem de cover do teste
     * @return string
     */
    public function getCover()
    {
        return 'coelinho230317.jpg';
    }

    /**
     * Retorna o título do quiz
     * @return string
     */
    public function getTitle()
    {
        return 'O que o coelhinho da páscoa vai trazer para você?';
    }

    /**
     * Renderiza o quiz
     * @return string
     */
    public function render()
    {
        return 'teste';
    }
}