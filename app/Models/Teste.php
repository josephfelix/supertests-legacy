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
}
