<?php
namespace App\Testes;

use Intervention\Image\ImageManagerStatic as Image;

class CoelhoPascoa extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'O que o coelhinho da páscoa vai trazer para você?';

    /**
     * Capa do teste
     */
    public $capa = 'coelinho230317.jpg';

    /**
     * Descrição do teste
     */
    public $descricao = 'Saiba agora o que o coelhinho da pascoa pode trazer para você!';

    /**
     * O teste retornará o mesmo resultado para o usuário que refazer?
     */
    public $unico = false;

    /**
     * Renderiza o quiz
     * @return string
     */
    public function render()
    {
        $img = Image::make(public_path().'/upload/coelho.jpg');
        $img->text($this->facebook->nome());

        return $img;
    }
}