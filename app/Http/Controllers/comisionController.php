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
        
        return view('comision.index',['coms'=>$coms, 'active'=>4,'subm'=>2,'subm2'=>1,'filtro'=>$filtro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $coms = 0; 
       $filtro = 0; 
       $no = comisiones::max('no') + 1;
       $datos = ['no' => $no]; 
       $empleados = \DB::table('empleados')
                         ->orderBy('NOMBRE_COMPLETO', 'ASC')
                         ->get();
       $usract = \Auth::user()->usuario_id;
       return view('comision.crear',['coms'=>$coms, 'active'=>4,'subm'=>2,'subm2'=>1,'filtro'=>$filtro,'no'=>$no,'empleados'=>$empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
