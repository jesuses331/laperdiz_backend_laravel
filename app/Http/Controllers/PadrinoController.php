<?php

namespace App\Http\Controllers;

use App\Models\Padrino;
use Illuminate\Http\Request;

class PadrinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Padrino::get();
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
        $padrino = new Padrino();
         $padrino->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function show(Padrino $padrino)
    {
        return $padrino;
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function edit(Padrino $padrino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $padrino = Padrino::find($id);
        $padrino->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Padrino $padrino)
    {
        $padrino->delete();
    }
}
