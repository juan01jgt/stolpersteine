<?php

namespace App\Http\Controllers;

use App\Models\Stolpersteine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StolpersteineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stolpersteines = Stolpersteine::paginate(5);
        return view('stolpersteine.index')
            ->with('stolpersteines',$stolpersteines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $stolpersteines = Stolpersteine::paginate(5);
        return view('stolpersteine.home')
            ->with('stolpersteines',$stolpersteines);
    }
    public function info()
    {
        $stolpersteines = Stolpersteine::paginate(5);
        return view('stolpersteine.info')
            ->with('stolpersteines',$stolpersteines);
    }
    public function contact()
    {
        $stolpersteines = Stolpersteine::paginate(5);
        return view('stolpersteine.contact')
            ->with('stolpersteines',$stolpersteines);
    }
    public function datastolpersteine($id)
    {
        $stolpersteines = Stolpersteine::find($id);
        return view('stolpersteine.datastolpersteine')
            ->with('stolpersteines',$stolpersteines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stolpersteine.form');
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
            'nombre' => 'required',
            'localidad' => 'required',
            'f_nacimiento' => 'required',
            'f_defuncion' => 'required',
            'biografia' => 'required',
            'Descripcion' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);

        $data = $request->only('nombre','localidad','f_nacimiento','f_defuncion','biografia','Descripcion','foto','lat','lon');
        if($request->file('foto')){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/fotos'), $filename);
            $data['foto']= $filename;
        }

        $stolpersteine = Stolpersteine::create($data);
        
        Session::flash('mensaje', 'Stolpersteine creada con exito');
        return redirect()->route('stolpersteine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stolpersteine  $stolpersteine
     * @return \Illuminate\Http\Response
     */
    public function show(Stolpersteine $stolpersteine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stolpersteine  $stolpersteine
     * @return \Illuminate\Http\Response
     */
    public function edit(Stolpersteine $stolpersteine)
    {
        return view('stolpersteine.form')
            ->with('stolpersteine',$stolpersteine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stolpersteine  $stolpersteine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stolpersteine $stolpersteine)
    {
        if($request->file('foto')){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/fotos'), $filename);
            $request['foto']= $filename;
        }
        $request->validate([
            'nombre' => 'required',
            'localidad' => 'required',
            'f_nacimiento' => 'required',
            'f_defuncion' => 'required',
            'biografia' => 'required',
            'Descripcion' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);

        $stolpersteine->nombre = $request['nombre'];
        $stolpersteine->localidad = $request['localidad'];
        $stolpersteine->f_nacimiento = $request['f_nacimiento'];
        $stolpersteine->f_defuncion = $request['f_defuncion'];
        $stolpersteine->biografia = $request['biografia'];
        $stolpersteine->Descripcion = $request['Descripcion'];
        $stolpersteine->foto = $request['foto'];
        $stolpersteine->lat = $request['lat'];
        $stolpersteine->lon = $request['lon'];
        $stolpersteine->save();
        
        Session::flash('mensaje', 'Stolpersteine editada con exito');

        return redirect()->route('stolpersteine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stolpersteine  $stolpersteine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stolpersteine $stolpersteine)
    {
        $stolpersteine->delete();
        Session::flash('mensaje', 'Stolpersteine eliminada con exito');

        return redirect()->route('stolpersteine.index');
    }

    public function addfoto(){
        return view('add_foto');
    }
	
    public function viewfoto(){
        return view('view_foto');
    }
}
