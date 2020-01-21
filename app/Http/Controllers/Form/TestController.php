<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('listAllUsers', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('listUser', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('addUser');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->nome = $request->name;
        $user->apelido = $request->apelido;
        $user->email = $request->email;
        $user->password = Hash::make($request->senha);
        $user->dataNascimento = $request->dataNascimento;
        $user->graduacao = $request->graduacao;

        $user->save();

        return redirect()->route('user.index');
    }

    public function update(User $user)
    {
        return view('editUSer', [
            'user' => $user
        ]);
    }

    public function edit(User $user, Request $request)
    {
        $user->nome = $request->name;
        $user->apelido = $request->apelido;
        $user->email = $request->email;
        $user->dataNascimento = $request->dataNascimento;
        $user->graduacao = $request->graduacao;

        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
