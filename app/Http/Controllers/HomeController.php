<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function denuncias()
    {
        return view('listaDenuncias');
    }
    public function noticias()
    {
        return view('listaNoticias');
    }
    public function cursos()
    {
        return view('listaCursos');
    }
    public function padrinos()
    {
        return view('listaPadrinos');
    }
    public function razas()
    {
        return view('listaRazas');
    }
}
