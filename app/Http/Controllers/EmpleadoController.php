<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use DB;
use rechum\empleados;
use Auth;
use Session;
use Redirect;
use mPDF;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

        //$this->middleware('admin', ['except' => ['fooAction', 'barAction']]);
    }

    public function index()
    {       
        if (Auth::user()->tipo !== "ADMIN") {  
            $empleados = DB::select('Select * from empleados order by apaterno');
            return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','empleados'=>$empleados]);
        }else{
            return Redirect::to('/empleados/lista');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // obtenemos el numero de contratos parea asignar el siguiente.
         $empleado = DB::select('select max(no) as NumeroCont from empleados');
         $empleado = $empleado[0]->NumeroCont+1;
         // obtenemos la lista de Puestos
         $puestos = DB::select('select puesto, id from funciones order by puesto');
         //Obtenemos los MAOS
         $adscrip = DB::table('maos')
              ->select('nombre_contrato','id')
              ->orderby('nombre_contrato','ASC')
              ->get();
         return view('empleados.crear',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>0,'noEmp'=>$empleado, 'puestos'=>$puestos, 'adscrip'=>$adscrip]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return "estoy guardando nuevo";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = DB::table('empleados')
                      ->where('id','=', $id)
                      ->first();
        $puestos = DB::table('funciones')
                      ->orderby('puesto','ASC')
                      ->get();
        $adscrip = DB::table('maos')
                      ->select('nombre_contrato','id')
                      ->orderby('nombre_contrato','ASC')
                      ->get();
        $nivelesc = ['PRIMARIA','SECUNDARIA','PREPARATORIA','LICENCIATURA','MAESTRIA','DOCTORADO','ESPECIALIDAD'];
        //$nivelesc = { {Dato: 'PRIMARIA'}, {Dato: 'SECUNDARIA'}, {Dato: 'PREPARATORIA'}, {Dato: 'LICENCIATURA'}, {Dato: 'MAESTRIA'}, {Dato: 'DOCTORADO'}, {Dato: 'ESPECIALIDAD'} };
        return view('empleados.editarall',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>'0','empleado'=>$empleado,'puestos'=>$puestos, 'adscrip'=>$adscrip,'nivelesc'=>$nivelesc]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $empleado = DB::table('empleados')
                      ->where('id','=', $id)
                      ->first();
        $puestos = DB::table('funciones')
                      ->orderby('puesto','ASC')
                      ->get();
        $nivelesc = ['PRIMARIA','SECUNDARIA','PREPARATORIA','LICENCIATURA','MAESTRIA','DOCTORADO','ESPECIALIDAD'];
        return view('empleados.editar',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>'0','empleado'=>$empleado,'puestos'=>$puestos,'nivelesc'=>$nivelesc]);
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
        $emp = empleados::find($id);
        $emp->no = $request['no'];
        $emp->CURP = $request['CURP'];
        $emp->ESCOLARIDAD = $request['ESCOLARIDAD'];
        $emp->CALLE = $request['CALLE'];
        $emp->NuMERO = $request['NuMERO'];
        $emp->COLONIA = $request['COLONIA'];
        $emp->copigop = $request['copigop'];
        $emp->CIUDAD = $request['CIUDAD'];
        $emp->ENTFED = $request['ENTFED'];
        $emp->EDOCIVIL = $request['EDOCIVIL'];
        $emp->SEXOFM = $request['SEXOFM'];
        $emp->FACTORRH = $request['FACTORRH'];
        $emp->CORREOE = $request['CORREOE'];
        $emp->TELEFONOCONT = $request['TELEFONOCONT'];
        $emp->TELEFONOCEL = $request['TELEFONOCEL'];
        $emp->nombrepllamar = $request['nombrepllamar'];
        $emp->TELEFONOMERGENCIA = $request['TELEFONOMERGENCIA'];
        //dd($emp);
        $emp->Save();

        //$emps = \empleados::paginate($this->Indice);

        Session::flash('message','Empleado Editado correctamente');

        return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
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

    public function lista(Request $request){

        //$empleados = DB::select('Select * from empleados order by apaterno')->paginate();
        $filtro = $request->name;
        if (trim($filtro) != "" && isset($filtro)){ 
          $empleados = empleados::where('NOMBRE_COMPLETO',"LIKE", "%$filtro%")
                         ->orWhere('RFC','like','%'.$filtro.'%')
                         ->orderBy('apaterno','ASC')
                         ->paginate();
        }else{
          $empleados = empleados::orderBy('apaterno','ASC')
                         ->paginate(); 
        }
        return view('empleados.lista',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','empleados' => $empleados,'filtro'=>$filtro]);
    }
    /**
     * Ésta sección redirige a la cuenta asignada al personal.
     *
     * usuario_id de la tabla User, contiene una liga al empleado.RFC
     * Si es administrador y no tiene este link, mandara al listado de empleados.
     * Si es empleado debe existir el trigger en la tabla
     *
     * El procedimiento es que al crear un usuario, se cree un procedimiento boot
     * el cual despues de insertar un empleado, se cree un usuario con los datos del
     * empleado, para poder registrarse.
     *  
     *   // al actualizar un post
     *   Post::updating(function($table){
     *       $table->updated_by = Auth::user()->id;
     *   });
         //   https://www.uno-de-piera.com/laravel-5-eventos-en-eloquent/
     *
     */
    public function datosper(){

        $cual = Auth::user()->usuario_id;
        if (!empty($cual)){

          //$empleado = DB::select('Select * from empleados where id = ?',[$cual]);
          $empleado = DB::table('empleados')
                      ->where('id','=', $cual)
                      ->first();
          $nivelesc = ['PRIMARIA','SECUNDARIA','PREPARATORIA','LICENCIATURA','MAESTRIA','DOCTORADO','ESPECIALIDAD'];
          return view('empleados.editar',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>'0','empleado'=>$empleado,'nivelesc'=>$nivelesc]);
        }else{
            Session::flash('message','Su cuenta no esta registrada como empleado, por lo que no tiene datos personales que modificar. Si tiene un empleado lige esta cuenta con la de un empleado.');
             return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
        }
    }

    public function oficiop($id){
        $empleado = DB::table('empleados')
                      ->where('id','=', $id)
                      ->first();

        // Regeneramos el contrato
        $html = view('empleados.oficiop',['Datos'=>$empleado,'PUESTODIRECTORGRAL'=>$empleado->PUESTODIRECTORGRAL,'NombDirector'=>'DR. JUAN MANUEL JIMÉNEZ HERRERA'])->render();

        $namefile = 'oficiopresentacion_'.time().'.pdf';
        // $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        //$fontDirs = $defaultConfig['fontDir'];
        //$defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        //$fontData = $defaultFontConfig['fontdata'];
        //$mpdf = new \Mpdf([
        //    'fontDir' => array_merge($fontDirs, [
        //        public_path() . '/admin/fonts',
        //    ]),
        //    'fontdata' => $fontData + [
        //        'arial' => [
        //            'R' => 'arial.ttf',
        //            'B' => 'arialbd.ttf',
        //        ],
        //    ],
        //    'default_font' => 'arial',
        //    // "format" => "A4",
        //    "format" => [216,279],
        //]);
        //Manual en:
        //https://mpdf.github.io/fonts-languages/fonts-in-mpdf-6-x.html
        $mpdf = new \mPDF();

        $mpdf->WriteHTML($html);
        //$mpdf->SetHTMLFooter("<img src='/img/pieofp.png'>");
        // dd($mpdf);
        $mpdf->Output($namefile,"I");
        //return response()->download($mpdf);
        //return view('empleados.oficiop',['Datos'=>$empleado,'PUESTODIRECTORGRAL'=>$empleado->PUESTODIRECTORGRAL,'NombDirector'=>'DR. JUAN MANUEL JIMÉNEZ HERRERA'])->render();
    }

    public function contrato($id){
        //return view('empleados.contrato');
        $empleado = DB::table('empleados')
                      ->where('id','=', $id)
                      ->first();
        $funciones = DB::Select('Select funciones from funciones where id=:Cual',[$empleado->funciones]);
        $html = view('empleados.contrato',['Datos'=>$empleado,'PUESTODIRECTORGRAL'=>$empleado->PUESTODIRECTORGRAL,'NombDirector'=>'DR. JUAN MANUEL JIMÉNEZ HERRERA','funciones'=>$funciones[0]->funciones])->render();
        $namefile = 'contrato_'.time().'.pdf';
        //$defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        //$fontDirs = $defaultConfig['fontDir'];
        //$defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        //$fontData = $defaultFontConfig['fontdata'];
        //$mpdf = new \Mpdf([
        //    'fontDir' => array_merge($fontDirs, [
        //        public_path() . '/font',
        //    ]),
        //    'fontdata' => $fontData + [
        //        'arial' => [
        //            'R' => 'arial.ttf',
        //            'B' => 'arialbd.ttf',
        //        ],
        //    ],
        //    'default_font' => 'arial',
        //    // "format" => "A4",
        //    "format" => [216,279],
        //]);
        
        //$mpdf->SetDisplayMode('fullpage');
        $mpdf = new \mPDF();
        //$mpdf->SetTopMargin(2.5);
        $mpdf->WriteHTML($html);
        //$mpdf->SetHTMLHeader("<div style='position: absolute; top: 20px;'><img src='/img/encabezadoofp.png' ></div>");
        //$mpdf->SetHTMLFooter("<div style='left: 200px;'> <img src='/img/piecontrato.png'> </div>");
        // dd($mpdf);
        //https://mpdf.github.io/paging/using-page.html
        $mpdf->Output($namefile,"I");
    }

    public function comprobantes(){
        $cual = Auth::user()->usuario_id;
        if (!empty($cual)){
            $emp = DB::table('empleados')
                          ->where('id','=', Auth::user()->usuario_id)
                          ->first();
            $RFC = $emp->RFC;
            return view('empleados.comprobantes',['active'=>'0', 'subm'=>'0', 'subm2'=>'0','RFC'=>$RFC]);
        }else{
             Session::flash('message','Su cuenta no esta registrada como empleado, por lo que no tiene comprobantes asignados.');
             return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
        } 
    }

    public function expediente(){
        
        $cual = Auth::user()->usuario_id;
        if (!empty($cual)){
            $emp = DB::table('empleados')
                          ->where('id','=', Auth::user()->usuario_id)
                          ->first();
            $RFC = $emp->RFC;
            $dir = public_path() . "/expediente/" . $RFC;
            if (!file_exists($dir)) 
                if(!mkdir($dir, 0777, true)) {
                    Session::flash('Fallo al crear las carpetas...');
                }
            return view('empleados.expediente',['active'=>'0', 'subm'=>'0', 'subm2'=>'0','RFC'=>$RFC]);
        }else{
             Session::flash('message','Su cuenta no esta registrada como empleado, por lo que no tiene comprobantes asignados.');
             return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
        } 
    }

    public function GuardarDOC(request $request){
        $file = $request->file('arch');
        $path = public_path() . '/expediente/' . $request['RFC'];
        $nombre = $request['name'];
        
        if (!file_exists($path)) {
            mkdir($path, 0775, true);
            //\File::makeDirectory($path);
        }
        $A = $path . '/' . $nombre;
        // Borramos el archivo para colocar el nuevo.
        if (file_exists($A)) {
            Session::flash('message','Se cambio documento');
            unlink($A);
            //dd($A);
            //\File::makeDirectory($path);
        }
        //return dd($file);
        //$file->move($path, $nombre);
        try {

                $file->move($path, $nombre);

            } catch (\Exception $e) {

               Session::flash('message','No se pudo realizar la subida corretamente!'.$e);
               return Redirect::to('/empleados/expediente');
            }

        Session::flash('message','Archivo '.$nombre.' subido correctamente');
        
        return Redirect::to('/empleados/expediente');
    } 

}
