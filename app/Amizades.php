<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Mix;
use phpDocumentor\Reflection\Types\Integer;

class Amizades extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'amizades';

    public function find($campos = [] , $options = [])
    {
        if (empty($campos)) {
            $amizade = Amizades::all();
        }

        if ($options && empty($campos)) {
            $amizade = Amizades::where([$options])->get();
        }

        if ($campos && empty($options)) {
            $amizade = Amizades::all($campos);
        }

        return $amizade;
    }

    public function findFirst($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            $amizade = Amizades::get()->first();
        }

        if ($options && empty($campos)) {
            $amizade = Amizades::where($options)->get()->first();
        }

        if ($campos && empty($options)) {
            $amizade = Amizades::get($campos)->first();
        }

        return $amizade;
    }

    public function verificarAmizade($idUsuarioDe, $idUsuarioPara)
    {
        $amizade = Amizades::where([
            ['idUsuarioDe', $idUsuarioDe],
            ['idUsuarioPara', $idUsuarioPara]
        ])->orWhere([
            ['idUsuarioPara', $idUsuarioDe],
            ['idUsuarioDe', $idUsuarioPara]
        ])->get()->first();

        return $amizade;
    }
}
