<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Denuncias;
use App\Models\Image;
use App\Models\Mascota;
use App\Models\Noticia;
use App\Models\Noticias;
use Illuminate\Http\Request;

class PerdizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $denuncias = Denuncia::paginate();
        $mascotas= Mascota::paginate();
        $images = Image::all();
        return view('paginas.index', compact('mascotas','denuncias','images'));
    }

    public function adopciones()
    {
        $mascotas = Mascota::paginate();
        $images = Image::all();
        return view('paginas.adopciones', compact('mascotas','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function denuncias()
    {
        $denuncias = Denuncia::paginate();
        return view('paginas.denuncias', compact('denuncias'));
    }
    public function noticias()
    {
        $noticias = Noticia::paginate();
        return view('paginas.noticias', compact('noticias'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
