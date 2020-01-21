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
            return Amizades::all();
        }
    }

    public function verificarAmizade($idUsuarioDe, $idUsuarioPara)
    {
        $amizade = Amizades::where('idUsuarioDe', $idUsuarioDe)
            ->where('idUsuarioPara', '=', $idUsuarioPara, 'OR')
            ->where('idUsuarioDe', $idUsuarioPara)
            ->where('idUsuarioPara', '=', $idUsuarioDe)->get();

        if (count($amizade) == 0) {
            return false;
        }

        return $amizade[0];
    }
}
