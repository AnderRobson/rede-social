<?php

namespace App\Http\Controllers;

use App\Amizades;
use App\graduacoes;
use App\Posts;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Integer;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $publicacoes = new Posts();
        $publicacoes = $publicacoes->find();

        return view('pages.login.login');
    }

    public function login(Request $request)
    {
        $validated = new Usuarios();
        $validated = $validated->checkLogin($request['email'], $request['password']);

        if ($validated) {
            session_start();
            $_SESSION['idUser'] = $validated['id'];

            return redirect()->route('user.feed');
        }

        return redirect()->route('user.index');
    }

    public function feed()
    {
        session_start();
        if (! isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $usuarioLogado = new Usuarios();
        $usuarioLogado = $usuarioLogado->loggedUser($_SESSION['idUser']);
        $publicacoes = new Posts();
        $publicacoes = $publicacoes->find();

        return view('pages.publicacoes.publicacao',[
            'usuarioLogado' => $usuarioLogado,
            'publicacoes' => $publicacoes
        ]);
    }

    public function users(Request $request)
    {
        session_start();
        if (! isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $usuarioLogado = new Usuarios();
        $usuarioLogado = $usuarioLogado->loggedUser($_SESSION['idUser']);
        $usuarios = new Usuarios;
        $usuarios = $usuarios->find();

        return view('pages.usuarios.listAllUsers', [
            'usuarioLogado' => $usuarioLogado,
            'usuarios' => $usuarios,
            'request' => $request
        ]);
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
        session_start();
        if (! isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $usuarioLogado = new Usuarios();
        $usuarioLogado = $usuarioLogado->loggedUser($_SESSION['idUser']);
        $graduacao = new Graduacoes();
        $graduacao = $graduacao->find(['id' => $usuarios['graduacao']]);
        $usuarios['graduacao'] = $graduacao['titulo'];
        $amizades = new Amizades();
        $amizades = $amizades->verificarAmizade($usuarioLogado['id'], $usuarios['id']);
        $publicacoes = new Posts();
        $publicacoes = $publicacoes->find(null, ['idUsuario' => $usuarios['id']]);

        return view('pages.usuarios.profile', [
            'usuarioLogado' => $usuarioLogado,
            'usuarios' => $usuarios,
            'amizades' => $amizades,
            'publicacoes' => $publicacoes
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
        session_start();
        if (! isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $usuarioLogado = new Usuarios();
        $usuarioLogado = $usuarioLogado->loggedUser($_SESSION['idUser']);

        return view('pages.usuarios.editUSer', [
            'usuarioLogado' => $usuarioLogado,
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
        session_start();
        if (! isset($_SESSION['idUser'])) {
            return redirect()->route('user.feed');
        }

        $usuarios->delete();

        return redirect()->route('user.index');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        return redirect()->route('user.index');
    }
}
