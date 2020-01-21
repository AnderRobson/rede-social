<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'publicacoes';

    public function find($campos = [] , $options = [])
    {
        if (empty($campos)) {
            return Publicacoes::all();
        }
    }
}
