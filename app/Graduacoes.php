<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Mix;

class Graduacoes extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'graduacoes';

//    private $id;
//    private $ordem;
//    private $titulo;
//    private $descricao;
//    private $created_at;
//    private $updated_at;

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function __get($atributo) : Mix
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function find($campos = [] , $options = [])
    {
        if (empty($campos)) {
            return Graduacoes::all();
        }

        $result = Graduacoes::where('id','=', 7)->get();

        return $result[0];
    }
}
