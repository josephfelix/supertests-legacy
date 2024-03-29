<?php
namespace App\Testes;

use App\Libraries\Filters\ShadowFilter as ShadowFilter;
use Intervention\Image\ImageManagerStatic as Image;

class nacionalidade extends \App\TesteBase
{
    /**
     * Título do teste
     */
    public $titulo = 'Qual sua verdadeira Nacionalidade ?';

    /**
     * Capa do teste
     */
    public $capa = 'qual-sua-verdadeira-nacionalidade/nacionalidadecapa.jpg';

    /**
     * Mensagem que será exibida após o resultado
     */
    public $mensagem = '[[nome]], Essa é a sua verdadeira nacionalidade. Gostou?';


    /**
     * Descrição do teste
     */
    public $descricao = 'Faça o teste e veja qual é a sua nacionalidade';

    /**
     * O teste retornará o mesmo resultado para o usuário que refazer?
     */
    public $unico = true;

    /**
     * Renderiza o teste
     * @return \Intervention\Image\Image
     */
    public function render()
    {
        //esse comando abaixo puxa o nome da pessoa do facebook
        $nome = $this->facebook->nome();

        // nascionalidade
        $nacionalidade_foto = [
            'qual-sua-verdadeira-nacionalidade/alema.jpg',
            'qual-sua-verdadeira-nacionalidade/americano.jpg',
            'qual-sua-verdadeira-nacionalidade/argentino.jpg',
            'qual-sua-verdadeira-nacionalidade/canadense.jpg',
            'qual-sua-verdadeira-nacionalidade/espanholaa.jpg',
            'qual-sua-verdadeira-nacionalidade/italiana.jpg',
            'qual-sua-verdadeira-nacionalidade/mexicana.jpg',
            'qual-sua-verdadeira-nacionalidade/brasileira.jpg',
        ];


        // ESSE COMANDO ABAIXO PUXA AS FOTOS QUE SELECIONEI NO ARMARIO PARA PODER SORTEAR.
        $nacionalidade = sortear($nacionalidade_foto);

        // NESTE COMANDO ELE VAI PUXAR UMA FOTO DO ARMARIO PARA SER A FOTO DE FUNDO PARA O TESTE.
        $montagem = Image::make(public_path('/upload/' . $nacionalidade));


        // Foto do facebook
        $foto_facebook = Image::make($this->facebook->foto());

        // ESTE COMANDO DEFINI A LARGURA E ALTURA DA FOTO DO PERFIL DO FACEBOOK
        $foto_facebook->resize(295, 420);

        // Insere a foto do facebook na esquerda
        $montagem->insert($foto_facebook, 'top-left');

        // Alinhar nome ao centro
        $esquerda = 510 - (strlen($nome) * 9);

        // Cria a sombra em volta do nome
        $montagem->text($nome, $esquerda + 3, 125 + 3, function ($font) {
            $font->file(roboto());
            $font->size(60);
            $font->color('#000000');
        });

        // Escreve o texto padrão na foto
        $montagem->text($nome, $esquerda, 125, function ($font) {
            $font->file(roboto());
            $font->size(60);
            $font->color('#ffffff');
        });


        // Sorteia um percentual entre 85 e 100
        $percentual = sortear(range(85, 100)) . "%";

        // Cria a sombra em volta do percentual
        $montagem->text($percentual, 530 + 3, 390 + 3, function ($font) {
            $font->file(roboto());
            $font->size(50);
            $font->color('#000000');
        });

        // Escreve a frase aleatória na foto
        $montagem->text($percentual, 530, 390, function ($font) {
            $font->file(roboto());
            $font->size(50);
            $font->color('#ffffff');
        });

        return $montagem;
    }
}