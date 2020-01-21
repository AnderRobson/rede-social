<?php

namespace App\Http\Controllers;

use App\Amizades;
use App\Usuarios;
use Illuminate\Http\Request;

class AmizadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function find(Amizades $amizades)
    {
        return $amizades;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Usuarios $usuarios)
    {
        $amizades = new Usuarios();
        $amizades->idUsuarioDe = $request->id;
        $amizades->idUsuarioPara = $request->apelido;
        $amizades->aceite = 3;

        $amizades->save();

        return redirect()->route('usuarios.show', ['usuario' => $amizades['idUsuarioDe']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function show(Amizades $amizades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function edit(Amizades $amizades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amizades $amizades)
    {
        //
    }

    /**
     * Accept the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function solicitacao(Request $request, Amizades $amizades)
    {
        if ($request['solicitacao'] == 'Adicionar') {
//            $amizades->idUsuarioDe = ;
//            $amizades->idUsuarioPara = ;
//            $amizades->aceite = 3;
        } else if ($request['solicitacao'] == 'Aceitar') {
            $amizades->aceite = 2;
            $amizades->save();

            return redirect()->route('user.show',['usuarios' => $amizades['idUsuarioDe']]);
        } else if ($request['solicitacao'] == 'Adicionar') {

        } else {
//            return redirect()->route('user.edit' . $request)
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amizades $amizades)
    {
        //
    }
}
