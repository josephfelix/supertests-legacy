<?php
namespace App\Testes;

use App\Libraries\Filters\RoundFilter;
use Intervention\Image\ImageManagerStatic as Image;

class CoelhoPascoa extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'O que o coelhinho da Páscoa vai trazer pra você?';

    /**
     * Capa do teste
     */
    public $capa = 'o-que-o-coelhinho-da-pascoa-vai-trazer-para-voce/coelinho230317.jpg';

    /**
     * Descrição do teste
     */
    public $descricao = 'Faça o teste e veja o que o coelhinho da Páscoa vai trazer para você!';

    /**
     * O teste retornará o mesmo resultado para o usuário que refazer?
     */
    public $unico = false;

    /**
     * Renderiza o teste
     * @return \Intervention\Image\Image
     */
    public function render()
    {
        $nome = $this->facebook->nome();

        $frase1 = "Coelhinho da páscoa o que\ntrazes pra mim?";

        // Frases
        $frases = [
            "você precisa de\ncomeçar a namorar!\nChega de contatinhos.",
            "você precisa se casar\nchega de ficar enrolando."
        ];

        // Foto de fundo
        $img = Image::make(public_path('upload/o-que-o-coelhinho-da-pascoa-vai-trazer-para-voce/resposta.jpg'));

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