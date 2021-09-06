<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::get();
        foreach ($images as $data){
            $data->url = json_decode($data->url);
        }
        return response()->json([$images]);
        
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
        
        
       
        
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = Image::find($id);
        $images->url = json_decode($images->url);  
        return response()->json([$images]);
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
    public function update(Request $request,$id)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $image= Image::find($id); 
         $name = $image->name;
        $file = '/images/'.$name;
         $thumbnail = '/uploads/thumbnail/'.$name;
         Storage::delete([$file, $thumbnail]); // delete from folder $image->delete(); // delete from table return redirect()->back(); 
    }
    public function storeImage(Request $request)
    {
        $ultimo_id = Image::latest('id')->first()->id;
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
}
