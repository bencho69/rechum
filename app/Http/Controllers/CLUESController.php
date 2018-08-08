<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

use DB;
use RecHum\clues;
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
        if (trim($filtro) != "" && isset($filtro)){ 
          $tarifa = DB::table('clues')
                      ->where('nombreu',"LIKE", "%$filtro%")
                         ->orderBy('id','ASC')
                         ->paginate();
        }else{
          $tarifa = DB::table('clues')
                         ->orderby('id','ASC')
                         ->paginate(); 
        }
        $this->$filtro = $filtro;
                         //->get();   
        //$maos = DB::select('select * from maos order by no');
        return view('clues.index',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','clues'=>$tarifa,'filtro'=>$filtro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "Estoy en el EDIT";
        $tarifa = DB::table('tarifas')
                    ->where('id',"=", "$id")
                    ->get();
        $filtro = $request['filtro'];
        //$maos = DB::select('select * from maos where id = :cual order by no',['cual','=',$id]);
        return view('clues.edit',['active'=>'3', 'subm'=>'1', 'subm2'=>'0','tarifa'=>$tarifa[0],'filtro'=>$filtro]);
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
        //
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
