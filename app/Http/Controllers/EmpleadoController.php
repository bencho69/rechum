<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

use DB;
use empleados;
use Auth;
use Session;
use Redirect;
use Mpdf\Mpdf;

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
         $empleado = DB::select('select max(numero) as NumeroCont from empleados');
         $empleado = $empleado[0]->NumeroCont+1;
         // obtenemos la lista de Puestos
         $puestos = DB::select('select puesto, id from funciones order by puesto');
         return view('empleados.crear',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>0,'noEmp'=>$empleado, 'puestos'=>$puestos]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return "estoy guardando cambios";
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
          return view('empleados.editarall',['active'=>2, 'subm'=>1, 'subm2'=>0,'accion'=>0,'empleado'=>$empleado]); 
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
          return view('empleados.index',['active'=>2, 'subm'=>1, 'subm2'=>0,'accion'=>0,'empleado'=>$empleado]);
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

    public function lista(){
        $empleados = DB::select('Select * from empleados order by apaterno');
        return view('empleados.lista',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','empleados' => $empleados]);
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
          return view('empleados.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0','accion'=>0,'empleado'=>$empleado]);
        }else{
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
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/font',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            // "format" => "A4",
            "format" => [216,279],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLHeader("<div style='position: absolute; top: 20px;'><img src='/img/encabezadoofp.png' ></div>");
        $mpdf->SetHTMLFooter("<img src='/img/pieofp.png'>");
        // dd($mpdf);
        $mpdf->Output($namefile,"I");
        //return view('empleados.contrato',['Datos'=>$empleado,'PUESTODIRECTORGRAL'=>$empleado->PUESTODIRECTORGRAL,'NombDirector'=>'DR. JUAN MANUEL JIMÉNEZ HERRERA']);
    }

    public function contrato($id){
        //return view('empleados.contrato');
        $empleado = DB::table('empleados')
                      ->where('id','=', $id)
                      ->first();
        $html = view('empleados.contrato',['Datos'=>$empleado,'PUESTODIRECTORGRAL'=>$empleado->PUESTODIRECTORGRAL,'NombDirector'=>'DR. JUAN MANUEL JIMÉNEZ HERRERA'])->render();
        $namefile = 'contrato_'.time().'.pdf';
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/font',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            // "format" => "A4",
            "format" => [216,279],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLHeader("<div style='position: absolute; top: 20px;'><img src='/img/encabezadoofp.png' ></div>");
        $mpdf->SetHTMLFooter("<img src='/img/piecontrato.png'>");
        // dd($mpdf);
        $mpdf->Output($namefile,"I");
    }
}
