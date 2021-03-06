<?php

namespace rechum\Http\Controllers;

use Illuminate\Http\Request;

use rechum\Http\Requests;
use rechum\Http\Controllers\Controller;

use rechum\comisiones;
use Session;

class comisionController extends Controller
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
        $this->filtroN = null;
        $this->filtroO = null;
        $this->filtroD = null;
        $this->empleado = null;
        $this->origen  = "";
        $this->destino = "";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = $request->objetivo;
        $cual = \Auth::user()->usuario_id;
        $maos = \DB::table('maos')
                    ->orderBy('id','ASC')
                    ->get();
        $clues = \DB::table('clues')
                    ->orderBy('id','ASC')
                    ->get();          
        if (!empty($cual)){
            if (trim($filtro) != "" && isset($filtro)){ 
              $coms = comisiones::where([['objetivo',"LIKE", "%$filtro%"],['empleado_id','=',$cual]])
                             ->orderBy('no','ASC')
                             ->paginate();
            }else{
              $coms = comisiones::where('empleado_id','=',$cual)
                             ->orderBy('no','ASC')
                             ->paginate(); 
            }
        }else{
            Session::flash('message','Su cuenta no esta registrada como empleado, por lo que no tiene oficios de comision asignados. Si tiene un empleado lige esta cuenta con la de un empleado.');
            $cual = \Auth::user()->PASAJES;
            if (!empty($cual)){
               $coms = comisiones::orderBy('no','ASC')
                             ->paginate(); 
            }
            else {
              return view('admin.index',['active'=>'2', 'subm'=>'1', 'subm2'=>'0']);
            }
        }
        
        Session::all();
        
        return view('comision.index',['coms'=>$coms, 'active'=>4,'subm'=>2,'subm2'=>1,'filtro'=>$filtro,'maos'=>$maos,'clues'=>$clues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //Si e  
        
       $coms = 0; 
       $filtro = 0; 
       $no = comisiones::max('no') + 1;
       $datos = ['no' => $no]; 
       // Datos recibidos al actualizar pagina
       if (isset($request['filtroN'])){
          $filtroN = $request['filtroN'];
          $this->filtroN = $filtroN;
       }
       else{
          if(isset($this->filtroN)){
              $filtroN = $this->filtroN;
          }
          else{
              $filtroN = "";
          }
       }
       if(isset($request['empleado_id'])){
         $empleado_id = $request['empleado_id']; 
         $this->empleado =  $empleado_id;
       }
       else{
          if(isset($this->empleado)){
            $empleado_id = $this->empleado;
        }else{
            $empleado_id = 0;
        }
       }
       if(isset($request['filtroO'])){
         $filtroO = $request['filtroO']; 
         $this->filtroO = $filtroO; 
       }
       else{
          if(isset($this->filtroO)){
            $filtroO = $this->filtroO;
        }else{
            $filtroO = "";
        }
       }
       if(isset($request['filtroD'])){
         $filtroD = $request['filtroD']; 
         $this->filtroD = $filtroD; 
       }
       else{
          if(isset($this->filtroD)){
            $filtroD = $this->filtroD;
        }else{
            $filtroD = "";
        }
       }
       $origen   = $request['ORIGEN'];
       $destino  = $request['DESTINO'];

       //dd($filtroN);
       
       if(!isset($origen)) 
          $origen = "OFICINA CENTRAL";
       if(!isset($KmO)) 
          $KmO = 0;
       $empleados = \DB::table('empleados')
                         ->Where('NOMBRE_COMPLETO','like','%'.$filtroN.'%')
                         ->orderBy('NOMBRE_COMPLETO', 'ASC')
                         ->get();
       $usract = \Auth::user()->usuario_id;
       if ($filtroO != "")
       $lugar = \DB::select('Select nombre As NombreO, km, areainfluencia as localidad From maos where nombre like "'.'%'.$filtroO.'%"'.' union '.
                            'Select nombreu As NombreO, km, localidad From clues where nombreu like "'.'%'.$filtroO.'%"'. ' ' .
                            'Order By NombreO');
       else
       $lugar = \DB::select('Select nombre As NombreO, km, areainfluencia as localidad From maos  union '.
                            'Select nombreu As NombreO, km, localidad From clues  ' .
                            'Order By NombreO');       
       if ($filtroD != "")
       $lugard = \DB::select('Select nombre As NombreO, km, areainfluencia as localidad From maos where nombre like "'.'%'.$filtroD.'%"'.' union '.
                            'Select nombreu As NombreO, km, localidad  From clues where nombreu like "'.'%'.$filtroD.'%"'. ' ' .
                            'Order By NombreO');
       else
       $lugard = \DB::select('Select nombre As NombreO, km, areainfluencia as localidad From maos  union '.
                            'Select nombreu As NombreO, km, localidad From clues  ' .
                            'Order By NombreO');       
       // Buscamos el Destino Seleccionado y obtenemos el kilometraje.
       //if($destino != "" && isset($destino)){
       //   $kmD = \DB::table('maos')->where('nombre','=',$destino)->first();
       //   if($kmD->nombre == "" && !isset($kmD)){
       //      $kmD = \DB::table('clues')->where('nombreu','=',$destino)->first();
       //      if($kmD->nombreu == "" && !isset($kmD)){
       //         $Kilo = $kmD->km;
       //      }else $kilo = 0;   
       //   }else $kilo = 0;   
       //}else $kilo = 0;
       if($empleado_id != 0){
         $empleado = \DB::table('empleados')->Where('id','=',$empleado_id)->first();
         $PuestoB = $empleado->PUESTO;
         $puesto = \DB::table('funciones')->Where('puesto','=',$PuestoB)->first();
         $tarifas = \DB::table('tarifas')->Where('mando','=',$puesto->mando)->get();
       }else
          $tarifas = \DB::table('tarifas')->get();
       return view('comision.crear',['coms'=>$coms, 'active'=>4,'subm'=>2,'subm2'=>1,'filtro'=>$filtro,'no'=>$no,'empleados'=>$empleados,'lugar'=>$lugar,'filtroN'=>$filtroN,'empleado_id'=>$empleado_id, 'filtroO'=>$filtroO,'origen'=>$origen,'lugard'=>$lugard,'filtroD'=>$filtroD,'destino'=>$destino, 'tarifas'=>$tarifas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "estoy guardando";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
