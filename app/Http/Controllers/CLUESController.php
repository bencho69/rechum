<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use DB;
use rechum\clues;
Use Session;

class CLUESController extends Controller
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
        //
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
        //
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
        $filtroL = $request->localidad;
        if (trim($filtro) != "" && isset($filtro)){ 
          $clues = DB::table('clues')
                      ->where('nombreu',"LIKE", "%$filtro%")
                         ->orderBy('id','ASC')
                         ->paginate();
        }else{
             
            if (trim($filtroL) != "" && isset($filtroL)){ 
              $clues = DB::table('clues')
                          ->where('localidad',"LIKE", "%$filtroL%")
                             ->orderBy('id','ASC')
                             ->paginate();
            }else{
              $clues = DB::table('clues')
                             ->orderby('id','ASC')
                             ->paginate(); 
            }
        } 
                         //->get();   
        //$maos = DB::select('select * from maos order by no');
        return view('clues.index',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','clues'=>$clues,'filtro'=>$filtro,'filtroL'=>$filtroL]);
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
        $clues = DB::table('clues')
                    ->where('id',"=", "$id")
                    ->get();
        $filtro = $request['filtro'];
        $filtroL = $request['filtroL'];
        //$maos = DB::select('select * from maos where id = :cual order by no',['cual','=',$id]);
        return view('clues.edit',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','clues'=>$clues[0],'filtro'=>$filtro, 'filtroL'=>$filtroL]);
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
        $clues = clues::find($id);
        $clues->CLUES = $request['CLUES'];
        $clues->nombreu = $request['nombreu'];
        $clues->localidad = $request['localidad'];
        $clues->km = $request['km'];
        $clues->municipio = $request['municipio'];
        $clues->region = $request['region'];
        $clues->tipou = $request['tipou'];
        $clues->compfis = $request['compfis'];
        $clues->save();

        Session::flash('message','CLUES Guardado correctamente.');
        $filtro = $request['filtro'];
        $filtroL = $request['filtroL'];
        if (trim($filtro) != "" && isset($filtro)){ 
          $clues = DB::table('clues')
                      ->where('nombreu',"LIKE", "%$filtro%")
                         ->orderBy('id','ASC')
                         ->paginate();
        }else{
          if (trim($filtroL) != "" && isset($filtroL)){ 
              $clues = DB::table('clues')
                          ->where('localidad',"LIKE", "%$filtroL%")
                             ->orderBy('id','ASC')
                             ->paginate();
            }else{
              $clues = DB::table('clues')
                             ->orderby('id','ASC')
                             ->paginate(); 
            }
        }
                         //->get();   
       
        return view('clues.index',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','clues'=>$clues,'filtro'=>$filtro,'filtroL'=>$filtroL]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
