@extends ('layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Adicionar Empleado <br>
        <small>Indique el/los empleado/s que integran esta comisión.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/comision/"><i class="fa fa-dashboard"></i>Comision</a></li>
        <li><a href="/comision/addemp">Acuerdo</a></li>
        <li class="active">Empleado</li>
      </ol>
    </section>
@endsection

@section ('content')

  @if (session()->has('message'))
    @include('alerts.alerta')
  @endif
  <div class="col-md-12">
     <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seleccionar Empleado</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::open(['route' => array('comision.addemp', $com), 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                <label>Empleados</label>
                <select class="form-control" style="width: 100%;" name="empleado_id">
                @foreach($empleados as $emp)
                   @if($emp->id == \Auth::user()->usuario_id && isset(\Auth::user()->usuario_id))
                     <option value="{{$emp->id}}" selected>{{$emp->NOMBRE_COMPLETO}}</option>
                   @else
                     @if(isset($empleado_id) && $emp->id == $empleado_id)
                       <option value="{{$emp->id}}" selected>{{$emp->NOMBRE_COMPLETO}}</option>
                     @else
                        <option value="{{$emp->id}}">{{$emp->NOMBRE_COMPLETO}}</option>
                     @endif
                   @endif
                @endforeach
                </select>
                <input type="hidden" name="filtroN" value="{{ $filtroN }}">
                <input type="hidden" name="id" value="{{ $com }}">
                <input type="hidden" name="no" value="{{ $no }}">
                <input type="hidden" name="periodo" value="{{ $periodo }}">
                <button type="submit" class="btn btn-default">Seleccionar</button>
                {!! Form::close() !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::open(['route' => 'comision.addemp', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                      Nombre:
                      {!! Form::text('filtroN',$filtroN, ['class' => 'form-control','placeholder'=>'Nombre del empleado']) !!}
                    <input type="hidden" name="id" value="{{ $com }}">
                    <input type="hidden" name="no" value="{{ $no }}">
                    <input type="hidden" name="periodo" value="{{ $periodo }}">
                    <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
                    <button type="submit" class="btn btn-default">Buscar</button>
                    {!! Form::close() !!}
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Selecciona el filtro para reducir la lista de los origenes, al buscado.
        </div>
      </div>
      <!-- /.box -->
  </div>

  <!--  Inicio de Insertar Empleado -->
  <div class="col-md-12">
    <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar un empleado a la comision. No ( {{ $no }} ) {{ $com}}</h3>
        </div>

        <form class="form-horizontal" method="POST" action="{{ route('comision.storeemp')}}">
            {{ csrf_field() }}
          <div class="box-body">
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label>Empleado: </label>
              </div>
              <div class="col-sm-10">
                
                  @foreach($empleados as $emp)
                     @if($emp->id == $empleado_id)
                       <input type="text" class="form-control" placeholder="Elige el empleado." value="{{$emp->NOMBRE_COMPLETO}}" >
                     @endif
                  @endforeach
                
              </div>
            </div>
            <!-- Otra Linea     
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label >kilometraje a recorrer (Km)</label>
              </div>
              <div class="col-sm-10">
                @ foreach($lugard as $emp)
                   @ if($emp->NombreO == $destino)
                     <input type="text" class="form-control" disable placeholder="kilometraje." value="{ { $ emp->km}}">
                   @ endif
                @ endforeach
                @ if($destino == "")
                     <input type="text" class="form-control" placeholder="Indique el kilometraje.">
                @ endif  
                <button type="button" onclick="ruta_google();"> Para calcular la ruta seleccionada de clic aquí, luego en el enlace.</button>
                <a target="_blank" href="https://www.google.com.mx/maps/dir/17.5338657,-99.4947898/17.5342549,-99.4913194/@17.5333596,-99.4943691,17z/data=!3m1!4b1!4m2!4m1!3e0" id="rutagoogle"> Ver Cálculo Distancia</a>
                <p id="demo"></p>
              </div>
            </div>   
             se suprimio el kilometraje a recorrer por parte del empleado.
             Asumimos que es el mismo de la comision.-->
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="tarifa">Tarifa a utilizar:</label>
              </div>
              <div class="col-sm-10">
                <select class="form-control" style="width: 100%;" name="tarifa" id="selTarifa" onchange="Cambio()">
                @foreach($tarifas as $t)
                     <option value="{{$t->id}}">{{$t->concepto}} Grupo J.: {{$t->grupoj}} Tarifa: {{$t->tarifa}} Tarifa 50%: {{$t->tarifa50}} Tipo C.: {{$t->tipocom}} Moneda: {{$t->moneda}}
                @endforeach
                </select>
                <p id="demo"></p>
              </div>
            </div>            
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label >Monto a solicitar de viaticos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="viaticos" id="monto" class="form-control" placeholder="Monto_autorizado * numero_de_días.">

                <button type="button" onclick="montoviaticos();"> Para calcular el monto segun días de comisión de clic aquí.</button>
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label >Monto a solicitar de pasajes Foraneos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="pasajes" class="form-control" placeholder="Ingresa el monto de pasajes foraneos.">
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label >Monto a solicitar de combustible:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="combustible" class="form-control" placeholder="Ingresa el monto de combustible.">
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label >En caso de solicitar vehículo, indique las placas o numero económico:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="placas" class="form-control" placeholder="Ingresa placas o no económico del vehículo.">
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label>Monto a solicitar para otros gastos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="otro" class="form-control" placeholder="Ingresa el monto de 'otros gastos'.">
              </div>
            </div>
          </div>
              <!-- /.box-body -->
          <div class="box-footer col-sm-4">
            <input type="hidden" name="FiltroN" value="{{ $filtroN }}">
            <input type="hidden" name="no" value="{{ $no }}">
            <input type="hidden" name="periodo" value="{{ $periodo }}">
            <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
            <input type="hidden" name="comision_id" value="{{ $com }}">
            <input type="hidden" name="id" value="{{ $com }}">
            @if(isset($empleado_id) && $empleado_id != 0)
            <input type="submit" class="btn btn-primary "  value="Guardar">
            @endif
          </div>
        </form>
        <!-- /.box-footer-->
    </div>
  </div>
  <script>
    function montoviaticos() {
       alert("hola");
    }
    function Cambio(){
       var x = document.getElementById("selTarifa").value;
       var k;
       var tar = [
         <?php 
           $n = 0;
           foreach ($tarifas as $tar => $t){
           if ($n>0){
              if (($n % 10) == 0){
                 echo ", \n";
              }
              else{  
                 echo ", ";
              }  
           }
           echo "{id: " . $t->id . ", Tarifa: " . $t->tarifa . "}";  
           $n = $n + 1;
           }
           ?>

       ];
       for (k = 0; k < tar.length; k++) {
         if (x == tar[k].id){
            document.getElementById("demo").innerHTML = "Seleccionaste : " + x + " Tarifa: " + tar[x].Tarifa + " por un periodo de " + {{ $periodo }};  
            document.getElementById("monto").value = tar[x].Tarifa * {{ $periodo }};
         }
       }
    }
  </script>
@endsection
