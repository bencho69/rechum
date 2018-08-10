<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use rechum\estados;
use Session;

class estadosController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
        $this->Indice = 5;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = estados::paginate($this->Indice);
        Session::all();
        $datos = ['active' => 2, 'estados' => $estados,'subm'=>3,'subm2'=>1];
 
        return view('estados.index',['estados'=>$estados,  'active'=>3,'subm'=>3,'subm2'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.crear')->with(['active'=>3,'subm'=>3, 'subm2'=>2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edo = new estados;

        $edo->no = $request['no'];
        $edo->descripcion = $request['descripcion'];
        $edo->imagen = null;

        $edo->Save();

        Session::flash('message','Estado Guardado correctamente.');

        $edos = estados::paginate($this->Indice);

        return view('estados.index',['estados'=>$edos, 'active'=>3,'subm'=>3,'subm2'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estados = estados::paginate($this->Indice);
        Session::all();
        $datos = ['active' => 2, 'estados' => $estados, 'subm' => 3, 'subm2' => 1];
 
        return view('estados.index', ['estados'=>$estados,  'active'=>3, 'subm'=>3, 'subm2'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edo = estados::find($id);

        return view('estados.edit',['estados'=>$edo, 'active'=>3, 'subm'=>3, 'subm2'=>1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $edo = estados::find($id);
        $edo->no = $request['no'];
        $edo->descripcion = $request['descripcion'];

        $edo->Save();

        $edos = estados::paginate($this->Indice);

        Session::flash('message','Estado Editado correctamente');

        return view('estados.index',['estados'=>$edos, 'active'=>3,'subm'=>1,'subm2'=>1]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edo = new estados;
        $edo->destroy($id);

        $estados = estados::paginate($this->Indice);

        Session::flash('message','Estado eliminado correctamente');
        return view('estados.index',['estados'=>$estados, 'active'=>3,'subm'=>3,'subm2'=>1]);
    }

    public function subirarch(request $request){
   
        $id=$request['id'];

        return view('estados.subirarch',['id'=>$id,'active'=>3, 'subm'=>3,'subm2'=>2]);
    }


}
