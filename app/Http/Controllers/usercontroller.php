<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

use Closure;
Use Session;
Use RecHum\User;
Use DB;
use Auth;

class usercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['create','show','destroy']]);
    
        $this->Indice =3;

        $active = 1;
        $subm  = 0;
        $subm2 =0;
        $filtro = '';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate($this->Indice);
        Session::all();
        
        return view('usuarios.create',['users' => $users, 'active'=>'1','subm'=>'2','subm2'=>'0']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = new User;

        $usr->name  = $request['name'];
        $usr->email = $request['email'];
        $usr->tipo  = $request['tipo'];
        $usr->password = bcrypt($request['password']);

        $usr->Save();

        Session::flash('message','Usuario Guardado correctamente.');

        $users = User::paginate($this->Indice);

        return view('usuarios.lista',['users'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0','filtro'=>'']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $filtro = $request->filtro;

        if (trim($filtro) != "" && isset($filtro)){ 
          $users = DB::table('users')
                      ->where('name',"LIKE", "%$filtro%")
                      ->orderBy('name','ASC')
                      ->paginate();
        }else{
          $users = DB::table('users')
                         ->orderby('name','ASC')
                         ->paginate($this->Indice); 
        }
        
        Session::all();
 
        return view('usuarios.lista',['users'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0','filtro'=>$filtro]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $filtro = $request->filtro;
        Session::all();
    
        return view('usuarios.edit',['user'=>$user, 'active'=>'1','subm'=>'2','subm2'=>'0','filtro'=>$filtro]); 
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
        $usr = User::find($id);

        $usr->name  = $request['name'];
        $usr->email = $request['email'];
        $usr->RECHUM = $request['RECHUM'];
        $usr->PASAJES = $request['PASAJES'];
        if (!empty($request['password'])){
           $usr->password = bcrypt($request['password']); 
        }
        
        $usr->Save();

        Session::flash('message','Usuario editado correctamente.');

        $filtro = $request->filtro;
        if (Auth::user()->tipo == "ADMIN"){
            if (trim($filtro) != "" && isset($filtro)){ 
              $users = DB::table('users')
                          ->where('name',"LIKE", "%$filtro%")
                          ->orderBy('name','ASC')
                          ->paginate();
            }else{
              $users = DB::table('users')
                             ->orderby('name','ASC')
                             ->paginate($this->Indice); 
            }
            return view('usuarios.lista',['users'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0','filtro'=>$filtro]);
        }
        else{
            $users = User::find($id);
            return view('auth.perfil',['user'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0']);
        }
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
