<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

use DB;
use RecHum\Maos;
Use Session;

class MaosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $active = 3;
        $subm  = 0;
        $subm2 =0;

        $pagina = 0;
        $filtro = '';
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
        $this->$filtro = $filtro;
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

        $usr = Maos::find($id);
        $usr->clave = $request['clave'];
        $usr->nombre = $request['nombre'];
        $usr->tipom = $request['tipom']; 
        $usr->operando = $request['operando'];
        $usr->areainfluencia = $request['areainfluencia'];
        $usr->capacidad = $request['capacidad'];
        $usr->turno = $request['turno'];
        $usr->nombre_contrato = $request['nombre_contrato'];
        $usr->save();

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