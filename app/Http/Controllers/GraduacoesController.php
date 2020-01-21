<?php

namespace App\Http\Controllers;

use App\graduacoes;
use Illuminate\Http\Request;

class GraduacoesController extends Controller
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

    public function find(Graduacoes $graduacoes)
    {
        return $graduacoes;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\graduacoes  $graduacoes
     * @return \Illuminate\Http\Response
     */
    public function show(graduacoes $graduacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\graduacoes  $graduacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(graduacoes $graduacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\graduacoes  $graduacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, graduacoes $graduacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\graduacoes  $graduacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(graduacoes $graduacoes)
    {
        //
    }
}
