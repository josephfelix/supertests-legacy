<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Teste
 * @package App\Models
 */
class Teste extends Model
{
    /**
     * Tabela onde será salvo os testes em cache
     * @var string
     */
    public $table = 'testes';

    /**
     * @var array
     */
    protected $fillable = ['title', 'cover', 'updated_at'];

    /**
     * Ao buscar pelo cover, retorna a url completa
     * @param $cover
     * @return string
     */
    public function getCoverAttribute($cover)
    {
        return url("upload/{$cover}");
    }

    /**
     * Ao buscar pelo slug, retorna a url completa
     * @param $slug
     * @return string
     */
    public function getSlugAttribute($slug)
    {
        return url("t/{$slug}");
    }
}
