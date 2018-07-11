<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

use RecHum\User;
use Auth;
use DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
    }

	public function admin(){
        return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
    }

    public function perfil(request $id)
    {
        $user = User::find(Auth::user()->id);
 
        return view('auth.perfil',['user'=>$user, 'active'=>'1','subm'=>'2','subm2'=>'0']);
    }

    public function download($file){

        $emp = DB::table('empleados')
                      ->where('id','=', Auth::user()->usuario_id)
                      ->first();
        $RFC = $emp->RFC;
      $pathtoFile = public_path() . '/comprobantes/' . $RFC . '/' . $file;
      return response()->download($pathtoFile);
    }
}
