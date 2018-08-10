<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use rechum\User;
use rechum\estados;
use rechum\municipios;
use Session;

class StorageController extends Controller
{
    public function subirarch(request $request){
        
        $id = $request['id'];

        return view('estados.subirarch',['id'=>$id,'active'=>'2','subm'=>'3','subm2'=>'2']);
    }

    public function GuardarArch(request $request){
        $id = $request['id'];
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        storage::disk('local')->put($nombre, \File::get($file));
        $edo = estados::find($id);
        $contents = $file->openFile()->fread($file->getSize());
        $edo->imagen = $contents;
        $edo->save();

        Session::flash('message','Imagen del estado subida correctamente');

        $edos = estados::paginate(5);
        
        return view('estados.index',['estados'=>$edos, 'active'=>'2','subm'=>'3','subm2'=>'2']);
    }
    /** Funciones para guardar la imegen del Municipio */
    public function subirmpo(request $request){

        $id=$request['id'];

        return view('municipios.subirmpo',['id'=>$id,'active'=>'2','subm'=>'2','subm2'=>'2']);
    }

    public function GuardarMPO(request $request){
        $id = $request['id'];
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        storage::disk('local')->put($nombre, \File::get($file));
        $mpo = municipios::find($id);
        $contents = $file->openFile()->fread($file->getSize());
        $mpo->imagen = $contents;
        $mpo->save();

        Session::flash('message','Imagen del Municipio subida correctamente');

        $mpos = municipios::paginate(5);
        
        return view('municipios.index',['mpos'=>$mpos, 'active'=>'2','subm'=>'2','subm2'=>'2']);
    }   

    public function subirAvatar(request $request){
        $id=$request['id'];

        return view('usuarios.subirAvatar',['id'=>$id,'active'=>'1','subm'=>'2','subm2'=>'0']);
    } 

    public function GuardarAvatar(request $request){
        $id = $request['id'];
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        storage::disk('local')->put($nombre, \File::get($file));
        $Usr = user::find($id);
        $contents = $file->openFile()->fread($file->getSize());
        $Usr->imagen = $contents;
        $Usr->save();

        Session::flash('message','Imagen de perfil subida correctamente');

        $user = user::find($id);
        
        return view('auth.perfil',['user'=>$user, 'active'=>'1','subm'=>'1','subm2'=>'0']);
        //return view('usuarios.lista',['id'=>$id, 'users'=>$users, 'active'=>$active,'subm'=>$subm,'subm2'=>$subm2]);
    }
    
   
}
