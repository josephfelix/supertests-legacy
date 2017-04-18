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
		
		// AQUI ELE ARMAZENA TODA AS IMAGENS DO TESTE GUARDANDO EM um ARMARIo..
		$imagens_bebe = [
            'upload/como-seria-seus-filhos-gemeos/bebe01.jpg',
            'upload/como-seria-seus-filhos-gemeos/bebe02.jpg',
            'upload/como-seria-seus-filhos-gemeos/bebe03.jpg',
            'upload/como-seria-seus-filhos-gemeos/bebe04.jpg',
            'upload/como-seria-seus-filhos-gemeos/bebe05.jpg',
        ];
		
		// ESSE COMANDO ABAIXO SORTEA UMA IMAGEM DO ARMARIO DE FOTOS.
		$imagem_bebe = sortear ($imagens_bebe);

         //Foto de fundo
        $img = Image::make(public_path($imagem_bebe));

         //Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());
		// ESTE COMANDO ABAIXO Diminui a foto do facebook     ---para 260x400
        $foto_facebook->resize(260, 300);

        // Insere a foto do facebook
        $img->insert($foto_facebook, 'left-top', 20, 80);

	
	

        return $img;
    }
}
