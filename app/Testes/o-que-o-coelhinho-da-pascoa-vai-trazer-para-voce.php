<?php
namespace App\Testes;

use App\Libraries\Filters\RoundFilter;
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
     * @return \Intervention\Image\Image
     */
    public function render()
    {
        $frase1 = "Coelhinho da páscoa o que\ntrazes pra mim?";

        // Frases
        $frases = [
            "Talento!!! Só o esforço\nnão está dando certo.",
            "Uma esposa!! Chega de contatinhos."
        ];

        // Foto de fundo
        $img = Image::make(public_path('/upload/resposta.jpg'));

        // Foto do facebook
        $photo = Image::make($this->facebook->foto());

        // Deixa a foto redonda
        $photo->filter(new RoundFilter(100));

        // Insere a foto do facebook
        $img->insert($photo, 'top-left', 22, 22);

        // Escreve o texto na foto
        $img->text($frase1, 271, 125, function($font) {
            $font->file(public_path('/fonts/roboto/Roboto-Bold.ttf'));
            $font->size(35);
            $font->color('#ffffff');
        });

        // Escreve o texto aleatório na foto
        $img->text(sortear($frases), 155, 310, function($font) {
            $font->file(public_path('/fonts/roboto/Roboto-Bold.ttf'));
            $font->size(35);
            $font->color('#ffffff');
        });

        return $img;
    }
}