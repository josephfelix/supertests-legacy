<?php
namespace App\Testes;

use Intervention\Image\ImageManagerStatic as Image;
use App\Libraries\Filters\RoundFilter;

class Salario extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'Qual deveria ser seu salario?';

    /**
     * Capa do teste
     */
    public $capa = 'qual-deveria-ser-seu-salario/capa.jpg';

    /**
     * Descrição do teste
     */
    public $descricao = 'Faça o teste e descubra quanto deveria ser realmente seu salário';

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
        // imagens_salario CTRL D PARA DUPLICAR AS IMAGENS PARA SAIR ALEATORIAS.
        $imagens_teste_salario = [
            'qual-deveria-ser-seu-salario/salario01.jpg',
            'qual-deveria-ser-seu-salario/salario02.jpg',
            'qual-deveria-ser-seu-salario/salario03.jpg',
            'qual-deveria-ser-seu-salario/salario04.jpg',
            'qual-deveria-ser-seu-salario/salario05.jpg',
        ];

        // Sorteia um salario
        $imagem_teste_salario = sortear($imagens_teste_salario);

        // Foto que será usada para fazer a montagem
       // $montagem = Image::canvas(800, 400, '#fff');

        // Foto de fundo
        $foto_fundo = Image::make(public_path('/upload/' . $imagem_teste_salario));

        // Diminui a foto da celebridade para 260x400
        //$foto_celebridade->resize(260, 400);

        // Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());

        // Diminui a foto do facebook para 260x400
        //$foto_facebook->resize(260, 400);

        // Insere a foto do facebook na esquerda
		
        $foto_fundo->insert($foto_facebook, 'top-left',60,160);
		//$foto_facebook->filter(new RoundFilter(100));  <<< ESSE COMANDO FAZ A FOTO FICAR REDONDA.
		$nome = $this->facebook->nome();
$foto_fundo->text($nome, 20, 125, function($font) {
            $font->file(roboto());
            $font->size(30);
            $font->color('#ffffff');
        });
	

        

        return $foto_fundo;
    }
}