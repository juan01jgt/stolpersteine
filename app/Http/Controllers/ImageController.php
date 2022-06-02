<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Stolpersteine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Stolpersteine $stolpersteine)
    {
        return view('stolpersteine.formimage')
            ->with('stolpersteine',$stolpersteine);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_stolpersteine' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $data = $request->only('id_stolpersteine','nombre','descripcion');
        if($request->file('nombre')){
            $file= $request->file('nombre');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/fotos'), $filename);
            $data['nombre']= $filename;
        }

        $image = Image::create($data);
        
        Session::flash('mensaje', 'Imagen subida con exito');
        return redirect()->route('stolpersteine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
