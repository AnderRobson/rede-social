<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Mix;
use phpDocumentor\Reflection\Types\Integer;

class Amizades extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'amizades';

    private $id;
    private $idUsuarioDe;
    private $idUsuarioPara;
    private $created_at;
    private $updated_at;

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
            return Amizades::all();
        }
    }
}
