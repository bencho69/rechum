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
        $this->middleware('admin',['only'=>['create','show','edit','update','destroy']]);
    
        $this->Indice =3;

        $active = 1;
        $subm  = 0;
        $subm2 =0;
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

        return view('usuarios.lista',['users'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = user::paginate($this->Indice);
        Session::all();
 
        return view('usuarios.lista',['users'=>$users, 'active'=>'1','subm'=>'2','subm2'=>'0']);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        Session::all();
 
        return view('usuarios.edit',['user'=>$user, 'active'=>'1','subm'=>'2','subm2'=>'0']); 
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
