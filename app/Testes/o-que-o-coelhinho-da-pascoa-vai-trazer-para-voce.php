<?php
namespace App\Testes;
use App\TesteBase;

class CoelhoPascoa extends TesteBase
{
    public $titulo = 'O que o coelhinho da páscoa vai trazer para você?';
    public $capa = 'coelinho230317.jpg';

    /**
     * Renderiza o quiz
     * @return string
     */
    public function render()
    {
        return 'teste';
    }
}