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
        $nome = $this->facebook->nome();

        $frase1 = "Coelhinho da páscoa o que\ntrazes pra mim?";

        // Frases
        $frases = [
            "você precisa de talento!!!\nSó o esforço não está dando certo.",
            "você precisa de uma\nesposa!! Chega de contatinhos."
        ];

        // Foto de fundo
        $img = Image::make(public_path('/upload/resposta.jpg'));

        // Foto do facebook
        $photo = Image::make($this->facebook->foto());

        // Deixa a foto redonda
        $photo->filter(new RoundFilter(100));

        // Insere a foto do facebook
        $img->insert($photo, 'top-left', 22, 22);

        // Escreve o texto padrão na foto
        $img->text($frase1, 271, 125, function($font) {
            $font->file(roboto());
            $font->size(25);
            $font->color('#ffffff');
        });

        // Sorteia uma frase
        $frase = $nome . ' ' . sortear($frases);

        // Escreve a frase aleatória na foto
        $img->text($frase, 155, 310, function($font) {
            $font->file(roboto());
            $font->size(25);
            $font->color('#ffffff');
        });

        return $img;
    }
}