<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Mix;

class Usuarios extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'usuarios';

    public function find($campos = [] , $options = [])
    {
        if (empty($campos)) {
            $usuario = Usuarios::all();

            return $usuario;
        }
    }
}
