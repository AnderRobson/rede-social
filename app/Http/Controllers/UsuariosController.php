<?php

namespace App\Http\Controllers;

use App\Amizades;
use App\graduacoes;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = new Usuarios;
        $usuarios = $usuarios->find();

        return view('pages.usuarios.listAllUsers', [
            'usuarios' => $usuarios,
            'request' => $request
        ]);
    }

    public function find(Usuarios $usuarios)
    {
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.login.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuarios();
        $usuario->nome = $request->name;
        $usuario->apelido = $request->apelido;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->senha);
        $usuario->dataNascimento = $request->dataNascimento;
        $usuario->graduacao = $request->graduacao;

        $usuario->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios $usuarios
     * @param  \App\Amizades $amizades
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {

        $graduacao = new Graduacoes();
        $graduacao = $graduacao->find(['id' => $usuarios['graduacao']]);
        $usuarios['graduacao'] = $graduacao['titulo'];
        $amizades = new Amizades();
        $amizades = $amizades->verificarAmizade($usuarios['id'],2) ?? null;

        return view('pages.usuarios.profile', [
            'usuarios' => $usuarios,
            'amizades' => $amizades
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        return view('pages.usuarios.editUSer', [
            'usuario' => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        if (isset($request['update'])) {
            $usuarios['nome'] = $request['nome'];
            $usuarios['sobrenome'] = $request['sobrenome'];
            $usuarios['dataNascimento'] = $request['dataNascimento'];
            $usuarios['graduacao'] = $request['graduacao'];
        } else {
            $usuarios['nome'] = $request['nome'];
            $usuarios['sobrenome'] = $request['sobrenome'];
//            $usuarios->email = $request['email'];
            $usuarios['dataNascimento'] = $request['dataNascimento'];
            $usuarios['graduacao'] = $request['graduacao'];
        }

        $usuarios->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        $usuarios->delete();

        return redirect()->route('user.index');
    }
}
