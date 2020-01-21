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
        dd($usuarios);
        $amizades = new Usuarios();
        $amizades->idUsuarioDe = $request->id;
        $amizades->idUsuarioPara = $request->apelido;
        $amizades->aceite = 3;

        $amizades->save();

        return redirect()->route('user.show', ['usuarios' => $amizades['idUsuarioDe']]);
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
//     * @param  \App\Amizades  $amizades
     * @return \Illuminate\Http\Response
     */
    public function solicitacao(Request $request, $idUsuarioDe)
    {
//        dd($request);
        if (isset($request['solicitacao'])) {
            $amizades = new Amizades();
            if ($request['solicitacao'] == 'Adicionar') {
                $amizades->idUsuarioDe = $idUsuarioDe;
                $amizades->idUsuarioPara = $request['idUsuarioPara'];
                $amizades->aceite = 3;

                $amizades->save();
            } else {
                $amizade = $amizades->verificarAmizade($idUsuarioDe,$request['idUsuarioPara']);
                $amizade->delete();
            }
        } //else if ($request['solicitacao'] == 'Aceitar') {
//            $amizades->aceite = 2;
//            $amizades->save();
//
//            return redirect()->route('user.show',['usuarios' => $amizades['idUsuarioDe']]);
//        } else if ($request['solicitacao'] == 'Adicionar') {
//
//        } else {
////
//        }
        return redirect()->route('user.show', ['usuarios' => $idUsuarioDe]);
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
