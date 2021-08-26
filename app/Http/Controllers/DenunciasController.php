<?php

namespace App\Http\Controllers;

use App\Models\Denuncias;
use Illuminate\Http\Request;

class DenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Denuncias::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $denuncias = new Denuncias();
        $denuncias->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denuncias  $denuncias
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncias $denuncias)
    {
        return $denuncias;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denuncias  $denuncias
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncias $denuncias)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denuncias  $denuncias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncias $denuncias)
    {
        $denuncias->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denuncias  $denuncias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncias $denuncias)
    {
        $denuncias->delete();
    }
}
