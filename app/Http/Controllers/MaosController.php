<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use DB;
use rechum\Maos;
Use Session;

class MaosController extends Controller
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
        return "Estoy en el indice";
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
        return "estoy guardando";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $filtro = $request->name;
        if (trim($filtro) != "" && isset($filtro)){ 
          $maos = DB::table('maos')
                      ->where('nombre_contrato',"LIKE", "%$filtro%")
                         ->orderBy('no','ASC')
                         ->paginate();
        }else{
          $maos = DB::table('maos')
                         ->orderby('no','ASC')
                         ->paginate(); 
        }
                         //->get();   
        //$maos = DB::select('select * from maos order by no');
        return view('maos.index',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','maos'=>$maos,'filtro'=>$filtro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //return "Estoy en el EDIT";
        $mao = DB::table('maos')
                    ->where('id',"=", "$id")
                    ->get();
        $filtro = $request['filtro'];
        //$maos = DB::select('select * from maos where id = :cual order by no',['cual','=',$id]);
        return view('maos.edit',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','mao'=>$mao[0],'filtro'=>$filtro]);
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
        //$mao = DB::table('maos')
        //            ->where('id',"=", "$id")
        //            ->get();

        $mao = Maos::find($id);
        $mao->clave = $request['clave'];
        $mao->nombre = $request['nombre'];
        $mao->tipom = $request['tipom']; 
        $mao->operando = $request['operando'];
        $mao->areainfluencia = $request['areainfluencia'];
        $mao->capacidad = $request['capacidad'];
        $mao->turno = $request['turno'];
        $mao->nombre_contrato = $request['nombre_contrato'];
        $mao->save();

        Session::flash('message','Usuario Guardado correctamente.');
        $filtro = $request['filtro'];
        if (trim($filtro) != "" && isset($filtro)){ 
          $maos = DB::table('maos')
                      ->where('nombre_contrato',"LIKE", "%$filtro%")
                         ->orderBy('no','ASC')
                         ->paginate();
        }else{
          $maos = DB::table('maos')
                         ->orderby('no','ASC')
                         ->paginate(); 
        }
                         //->get();   
        //$maos = DB::select('select * from maos order by no');
        return view('maos.index',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','maos'=>$maos,'filtro'=>$filtro]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Estoy en el DESTROY";
    }
}
