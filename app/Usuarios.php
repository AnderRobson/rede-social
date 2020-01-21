<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Mix;

class Usuarios extends Model
{
    /** @var string $table = Tabela referente a model */
    protected $table = 'usuarios';

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $email_verified_at;
    private $password;
    private $dataNascimento;
    private $graduacao;
    private $imagem;
    private $capa;
    private $remember_token;
    private $created_at;
    private $updated_at;

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function __get($atributo)
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
            $usuario = Usuarios::all();

            return $usuario;
        }
    }
}
