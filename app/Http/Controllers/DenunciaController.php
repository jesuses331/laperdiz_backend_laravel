<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\DenunciaRequest;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Denuncia::get();
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
    public function store(DenunciaRequest $request)
    {
        $denuncia = new Denuncia();
        $denuncia->titulo=$request->input('titulo');
        $denuncia->ciudad=$request->input('ciudad');
        $denuncia->resumen=$request->input('resumen');
        $denuncia->fecha=$request->input('fecha');
        $denuncia->descripcion=strip_tags($request->input('descripcion'));
        $denuncia->save();
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $denuncia)
    {
        return $denuncia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncia $denuncia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function update(DenunciaRequest $request, $id)
    {
        $denuncia = Denuncia::find($id);
        $denuncia->titulo=$request->input('titulo');
        $denuncia->ciudad=$request->input('ciudad');
        $denuncia->resumen=$request->input('resumen');
        $denuncia->fecha=$request->input('fecha');
        $denuncia->descripcion=strip_tags($request->input('descripcion'));
        $denuncia->save();
        $models = 'App\Models\Denuncia';
        $image_id = DB::table('images')
                    ->where('imageable_id', '=', $id)
                    ->where('imageable_type', '=', $models)
                    ->value('id');
        $image=Image::find($image_id);
       
       
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $file) {

                $filename = '/images/'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $pictures[] = $filename;
            }
            $image->update([
                'url'=>json_encode($pictures),
            ]);
            $denuncia->images()->save($image);
                
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $denuncia)
    {
        $denuncia->delete();
    }
    public function storeImage(Request $request)
    {
        $ultimo_id = Denuncia::latest('id')->first()->id;
        $denuncia = Denuncia::find($ultimo_id);
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $file) {

                $filename = '/images/'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $pictures[] = $filename;
            }
            $image = new Image([
                'url'=>json_encode($pictures),
            ]);
        
          $denuncia->images()->save($image);
             
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
        
    }
}
