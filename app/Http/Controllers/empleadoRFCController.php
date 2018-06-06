<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

class empleadoRFCController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function RFC(request $request)
    {
        //return view('home');
        //$navs = Nav::all();
        //dd($nav);
       // $active = 0;
       // $subm = 0;
       // $subm2 = 0;
        //return view('empleadoRFC',['navs'=>$navs,'active'=>$active,'subm'=>$subm,'subm2'=>$subm2]);
        $rfc = $request["RFC"];
        return "El RFC es" . $rfc;    
    }
}
