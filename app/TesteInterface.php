<?php
namespace App;

interface TesteInterface
{
    /**
     * Retorna a imagem de cover do teste
     * @return string
     */
    public function getCover();

    /**
     * Retorna o título do quiz
     * @return string
     */
    public function getTitle();

    /**
     * Renderiza o quiz
     * @return void
     */
    public function render();
}