<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'publicacoes';

    public function find($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            return Posts::all();
        }

        if ($options && empty($campos)) {
            $publicacoes = Posts::where($options)->get();
        }

        if ($campos && empty($options)) {
            $publicacoes = Posts::all($campos);
        }

        if (count($publicacoes) == 0) {
            return false;
        }

        return $publicacoes;
    }
}
