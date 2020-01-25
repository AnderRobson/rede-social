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
        if (empty($campos) && empty($options)) {
            $usuario = Usuarios::all();
        }

        if ($options && empty($campos)) {
            $usuario = Usuarios::where($options)->get();
        }

        if ($campos && empty($options)) {
            $usuario = Usuarios::all($campos);
        }

        return $usuario;
    }

    public function findFirst($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            $usuario = Usuarios::get()->first();
        }

        if ($options && empty($campos)) {
            $usuario = Usuarios::where($options)->get()->first();
        }

        if ($campos && empty($options)) {
            $usuario = Usuarios::get($campos)->first();
        }

        return $usuario;
    }

    public function checkLogin($email, $password)
    {
        $validated = $this->findFirst(
            null, [
                'email' => $email,
                'password' => $password
            ]
        );

        return $validated;
    }

    public function loggedUser($idUsuario)
    {
        $idUsuario = $this->findFirst(null,['id' => $idUsuario]);

        return $idUsuario;
    }
}
