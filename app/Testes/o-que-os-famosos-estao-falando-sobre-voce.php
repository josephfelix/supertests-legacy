<?php
namespace App\Testes;

use App\Libraries\Filters\RoundFilter;
use Intervention\Image\ImageManagerStatic as Image;

class Famosos extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'O que os famosos estão falando sobre você no whatsapp?';

    /**
     * Capa do teste
     */
    public $capa = 'o-que-os-famosos-estao-falando-sobre-voce/whatsappcapa.jpg';

    /**
     * Descrição do teste
     */
    public $descricao = 'Clique aqui e descubra agora.';

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
        // Celebridades
        $Famosos_homem= [
            'o-que-os-famosos-estao-falando-sobre-voce/whatsapp06.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp07.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp08.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp05.jpg',
			
        ];
		
		
		 // Celebridades
        $Famosos_mulher= [
            'o-que-os-famosos-estao-falando-sobre-voce/whatsapp01.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp02.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp03.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp04.jpg',
			'o-que-os-famosos-estao-falando-sobre-voce/whatsapp05.jpg',
			
        ];
	    
		// AQUI NESTE COMANDO É PARA SABER SE É HOMEM  .	
		if ($this->facebook->homem()) {
			
			
			 $Famosos = sortear($Famosos_homem);
	
		// AQUI NESTE COMANDO É PRA SABER SE É MULHER.
		
		} elseif ($this->facebook->mulher()) {
			
			 $Famosos = sortear($Famosos_mulher);
	
	    }	

        
       

        // Foto que será usada para fazer a montagem
        $fundo = Image::make(public_path('/upload/' . $Famosos));

        // Foto de fundo
        

        // Diminui a foto da celebridade para 260x400
        

        // Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());
		//DEIXAR A FOTO REDONDA 
		$foto_facebook->filter(new RoundFilter(100));

        // Diminui a foto do facebook para 260x400
		$foto_facebook->resize(230,230);

        // Insere a foto do facebook na esquerda
        $fundo->insert($foto_facebook, 'top-left',27,7);

        // Insere a foto da celebridade na direita
        

        // Insere a foto do facebook com a foto da celebridade e aplica a opacidade
        //$foto_montagem = Image::canvas(260, 400, '#fff');
        //$foto_montagem->insert($foto_facebook, 'center');
        //$foto_celebridade->filter(new OpacityFilter(0.5));
        //$foto_montagem->insert($foto_celebridade, 'center');

        // Insere a montagem feita no meio da foto
        //$montagem->insert($foto_montagem, 'center');

        return $fundo;
    }
}