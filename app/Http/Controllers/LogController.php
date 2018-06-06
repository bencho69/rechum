<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;
use RecHum\Http\Requests;
use RecHum\Http\Requests\LoginRequest;
use Auth;
use Session;
use Redirect;

use RecHum\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Si el empleado ya esta registrado va a la sección de administración directamente.
        if (Auth::guest()){
           return view("auth/login");    
        }
        else{
            return Redirect::to('/empleados');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            return Redirect::to('/empleados');
        }
        Session::flash('message-error','Datos son incorrectos');
        return Redirect::to('/log');
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
