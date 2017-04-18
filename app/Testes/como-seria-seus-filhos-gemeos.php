<?php
namespace App\Testes;

use App\Libraries\Filters\RoundFilter;
use Intervention\Image\ImageManagerStatic as Image;

class gemeos extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'Como seria seus filhos Gêmeos?';

    /**
     * Capa do teste
     */
    public $capa = 'como-seria-seus-filhos-gemeos/gemeoscapa.jpg';
                   
    /**
     * Descrição do teste
     */
    public $descricao = 'Faça o teste e veja como seria seus filhos gêmeos';

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

         //Frases
        $frases = [
            "olha como vão ser lindos *.*",
            "olha como vão ser lindos *.*"
        ];

         //Foto de fundo
        $img = Image::make(public_path('upload/como-seria-seus-filhos-gemeos/bebe01.jpg'));

         //Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());
		// ESTE COMANDO ABAIXO Diminui a foto do facebook     ---para 260x400
        $foto_facebook->resize(260, 300);

        // Insere a foto do facebook
        $img->insert($foto_facebook, 'left-top', 20, 80);

	// Cria a frase aleatória com o nome
	$frase = $nome . ' ' . sortear($frases);

        // Escreve a frase aleatória na foto
        $img->text($frase, 15, 401, function($font) {
            $font->file(roboto());
            $font->size(25);
            $font->color('#42f4d9');
        });

        return $img;
    }
}
