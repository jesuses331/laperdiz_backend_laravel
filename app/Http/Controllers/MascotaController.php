<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       return Mascota::get();
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
        $mascota = new Mascota();
         $mascota->create($request->all());
       
        
    }
       
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        return $mascota;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $mascota = Mascota::find($id);
        $mascota->update($request->all());
        $models = 'App\Models\Mascota';
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
            $mascota->images()->save($image);
                
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
        
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
    }
    /***********Funciones propias*****/
    public function storeImage(Request $request)
    {
        $ultimo_id = Mascota::latest('id')->first()->id;
        $mascota = Mascota::find($ultimo_id);
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $file) {

                $filename = '/images/'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $pictures[] = $filename;
            }
            $image = new Image([
                'url'=>json_encode($pictures),
            ]);
        
          $mascota->images()->save($image);
             
                
            return response()->json(['message'=>'image added']);
        }else{
            return response()->json(['message'=>'error']);
        }
        
    }
    public function updateImage(Request $request,$id){
        
    }
}
