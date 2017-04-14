<?php
namespace App\Testes;

use App\Libraries\Filters\OpacityFilter;
use Intervention\Image\ImageManagerStatic as Image;

class Celebridade extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'Qual celebridade se parece com você?';

    /**
     * Capa do teste
     */
    public $capa = 'celebridadecapa.jpg';

    /**
     * Descrição do teste
     */
    public $descricao = 'Saiba agora qual famoso que mais se parece com você!';

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
        $celebridades = [
            'jacob.jpg'
        ];

        // Sorteia uma celebridade
        $celebridade = sortear($celebridades);

        // Foto que será usada para fazer a montagem
        $montagem = Image::canvas(800, 400, '#fff');

        // Foto de fundo
        $foto_celebridade = Image::make(public_path('/upload/' . $celebridade));

        // Diminui a foto da celebridade para 260x400
        $foto_celebridade->resize(260, 400);

        // Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());

        // Diminui a foto do facebook para 260x400
        $foto_facebook->resize(260, 400);

        // Insere a foto do facebook na esquerda
        $montagem->insert($foto_facebook, 'top-left');

        // Insere a foto da celebridade na direita
        $montagem->insert($foto_celebridade, 'top-right');

        // Insere a foto do facebook com a foto da celebridade e aplica a opacidade
        $foto_montagem = Image::canvas(260, 400, '#fff');
        $foto_montagem->insert($foto_facebook, 'center');
        $foto_celebridade->filter(new OpacityFilter(0.5));
        $foto_montagem->insert($foto_celebridade, 'center');

        // Insere a montagem feita no meio da foto
        $montagem->insert($foto_montagem, 'center');

        return $montagem;
    }
}