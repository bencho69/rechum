<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use rechum\User;
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
    
    public function downloadArch($file){
      $emp = DB::table('empleados')
                      ->where('id','=', Auth::user()->usuario_id)
                      ->first();
      $RFC = $emp->RFC;
      $pathtoFile = public_path() . '/expediente/' . $RFC . '/' . $file;
      return response()->download($pathtoFile);
    }
}
