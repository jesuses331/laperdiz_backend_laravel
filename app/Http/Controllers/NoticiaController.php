<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Noticia::get();
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
        $noticia = new Noticia();
        $noticia->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return $noticia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::find($id);
        $noticia->update($request->all());
        $models = 'App\Models\Noticia';
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
            $noticia->images()->save($image);
                
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
        
        
        
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
    }

    public function storeImage(Request $request)
    {
        $ultimo_id = Noticia::latest('id')->first()->id;
        $noticia = Noticia::find($ultimo_id);
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $file) {

                $filename = '/images/'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $pictures[] = $filename;
            }
            $image = new Image([
                'url'=>json_encode($pictures),
            ]);
        
          $noticia->images()->save($image);
             
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
        
    }
}
