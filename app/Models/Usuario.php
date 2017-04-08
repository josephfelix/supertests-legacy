<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Usuario
 * @package App\Models
 */
class Usuario extends Model
{
    /**
     * Tabela onde será salvo os usuários
     * @var string
     */
    public $table = 'usuarios';

    /**
     * @var array
     */
    protected $fillable = ['userid', 'name', 'email', 'gender', 'birthday',
        'cover', 'favorite_athletes', 'favorite_teams', 'updated_at'];
}
