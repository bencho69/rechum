<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use rechum\municipios;
use rechum\estados;
use Session;

class MunicipiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mpos = municipios::paginate($this->Indice);
        Session::all();
 
        return view('municipios.index',['mpos'=>$mpos, 'active'=>3,'subm'=>4,'subm2'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edos = estados::all();
        return view('municipios.crear')->with(['estados'=>$edos,'active'=>3,'subm'=>4, 'subm2'=>2]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mpo = new municipios;

        $mpo->no = $request['no'];
        $mpo->descripcion = $request['descripcion'];
        $mpo->color = $request['color'];
        $mpo->entidadfed = $request['entidadfed'];

        $mpo->Save();

        Session::flash('message','Municipio Guardado correctamente.');

        $mpos = municipios::paginate();

        return view('municipios.index',['mpos'=>$mpos,  'active'=>3,'subm'=>2,'subm2'=>0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mpos = municipios::paginate();
        Session::all();
 
        return view('municipios.index',['mpos'=>$mpos, 'active'=>3,'subm'=>2,'subm2'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mpos = municipios::find($id);
    
        $edos = estados::all();
        // Buscar el indice del estado para colocar este en el combobox del editar.
        return view('municipios.editar',['mpos'=>$mpos, 'estados'=>$edos,  'active'=>3, 'subm'=>2, 'subm2'=>1]);
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
        $mpo = municipios::find($id);
        $mpo->no = $request['no'];
        $mpo->descripcion = $request['descripcion'];
        $mpo->color = $request['color'];

        $mpo->entidadfed = $request['entidadfed'];
        $mpo->Save();

        $mpos = municipios::paginate();

        Session::flash('message','Municipio Editado correctamente');
        return view('municipios.index',['mpos'=>$mpos, 'estados'=>$mpos,  'active'=>3,'subm'=>2,'subm2'=>1]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mpo = new municipios;
        $mpo->destroy($id);

        $estados = estados::paginate();

        $mpos = municipios::paginate();

        Session::flash('message','Municipio eliminado correctamente');
        return view('municipios.index',['mpos'=>$mpos, 'estados'=>$estados, 'active'=>3,'subm'=>2,'subm2'=>1]);
    }

    /* Funcion para subir imagen del municipio */
    public function subirmpo(request $request){

        $id=$request['id'];

        return view('municipios.subirmpo',['id'=>$id,'active'=>3,'subm'=>2,'subm2'=>1]);
    }
}
