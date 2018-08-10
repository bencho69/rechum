@extends ('layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Nueva comisión <br>
        <small>Indique los datos necesarios para su nueva comisión.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Catálogos</a></li>
        <li class="active">Estados</li>
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
                {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
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
              <input type="hidden" name="filtroO" value="{{ $filtroO }}">
              <input type="hidden" name="filtroD" value="{{ $filtroD }}">
              <input type="hidden" name="ORIGEN" value="{{ $origen }}">
              <input type="hidden" name="DESTINO" value="{{ $destino }}">
              <button type="submit" class="btn btn-default">Seleccionar</button>
                    {!! Form::close() !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                      Nombre:
                      {!! Form::text('filtroN',$filtroN, ['class' => 'form-control','placeholder'=>'Nombre del empleado']) !!}
                <input type="hidden" name="filtroO" value="{{ $filtroO }}">
                <input type="hidden" name="filtroD" value="{{ $filtroD }}">
                <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
                <input type="hidden" name="ORIGEN" value="{{ $origen }}">
                <input type="hidden" name="DESTINO" value="{{ $destino }}">
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
  <div class="col-md-12">
     <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seleccionar Origen</h3>

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
                {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                <label>Origenes</label>
                <select class="form-control" style="width: 100%;" name="ORIGEN">

                @foreach($lugar as $lugo)
                   @if($lugo->NombreO=="OFICINA CENTRAL")
                     <option value="CHILPANCINGO" selected>OFICINA CENTRAL</option>
                   @else
                     <option value="{{$lugo->NombreO}}">{{$lugo->NombreO}}</option>
                   @endif
                @endforeach

              </select>
              <input type="hidden" name="filtroN" value="{{ $filtroN }}">
              <input type="hidden" name="filtroO" value="{{ $filtroO }}">
              <input type="hidden" name="filtroD" value="{{ $filtroD }}">
              <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
              <input type="hidden" name="DESTINO" value="{{ $destino }}">
              <button type="submit" class="btn btn-default">Seleccionar</button>
                    {!! Form::close() !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                  Origen:
                  {!! Form::text('filtroO',$filtroO, ['class' => 'form-control','placeholder'=>'Nombre del origen']) !!}
                <input type="hidden" name="filtroN" value="{{ $filtroN }}">
                <input type="hidden" name="filtroD" value="{{ $filtroD }}">
                <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
                <input type="hidden" name="ORIGEN" value="{{ $origen }}">
                <input type="hidden" name="DESTINO" value="{{ $destino }}">                
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
          Selecciona el filtro para reducir la lista de empleados, al que estas buscando.
        </div>
      </div>
      <!-- /.box -->
  </div>
  <div class="col-md-12">
     <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Seleccionar Destino</h3>

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
                {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                <label>Destino</label>
                <select class="form-control select2" style="width: 100%;" name="DESTINO">
  
                @foreach($lugard as $lugd)
                     <option value="{{$lugd->NombreO}}">{{$lugd->NombreO }}, {{$lugd->localidad }}</option>
                @endforeach

              </select>
              <input type="hidden" name="filtroN" value="{{ $filtroN }}">
              <input type="hidden" name="filtroO" value="{{ $filtroO }}">
              <input type="hidden" name="filtroD" value="{{ $filtroD }}">
              <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
              <input type="hidden" name="ORIGEN" value="{{ $origen }}">
              <button type="submit" class="btn btn-default">Seleccionar</button>
                    {!! Form::close() !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::open(['route' => 'comision.create', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
                  Destino:
                  {!! Form::text('filtroD',$filtroD, ['class' => 'form-control','placeholder'=>'Nombre del destino']) !!}
                <input type="hidden" name="filtroN" value="{{ $filtroN }}">
                <input type="hidden" name="filtroO" value="{{ $filtroO }}"> 
                <input type="hidden" name="empleado_id" value="{{ $empleado_id }}">
                <input type="hidden" name="ORIGEN" value="{{ $origen }}">
                <input type="hidden" name="DESTINO" value="{{ $destino }}">
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
          Selecciona el filtro para reducir la lista de empleados, al que estas buscando.
        </div>
      </div>
      <!-- /.box -->
  </div>
  <script type="text/javascript">
    function ruta_google(){
      try {
        var x = document.getElementById('rutagoogle');
        var y = document.getElementById('origen').value;
        var z = document.getElementById('destino').value;
        
        if (y != "" && z != "")
         x.href = 'https://www.google.com.mx/maps/dir/' + y + '/' + z + ',17z/data=!3m1!4b1!4m2!4m1!3e0';
        else
         alert('Origen y destino deben tener un valor.\n\nSeleccione el "origen" y/o "destino" de la herramienta y de clic en "seleccionar" o escriba el origen y destino directamente en el recuadro del "Lugar de origen/destino de la comisión."\n\nGracias.');

        return;
      } catch(excepcion) {
        alert(excepcion);
      }
    }


    function montoviaticos(){
      function diaSemana(x) {
        let date = new Date(x.value.replace(/-+/g, '/'));

        let options = {
          weekday: 'long',
          year: 'numeric',
          month: 'long',
          day: 'numeric'
        };
        document.getElementById('demo').innerHTML = date.toLocaleDateString('es-MX', options);
      }

      let dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"];
      var x = document.getElementById('inicioC');
          y = document.getElementById('finalC');
          if (x.value == "" || y.value == ""){
            alert('Fecha de inicio y/o Fin de la comision debe tener un valor.\n\nSeleccione la fecha inicial y/o fecha final de la comisión."\n\nGracias.');
            return;
          }
          if (x.value > y.value){
            alert('Fecha de termino de la comisión debe ser mayor o igual a la fecha de inicio de ésta.\n\nSeleccione la fecha correcta."\n\nGracias.');
            return;   
          }
          diaSemana(x.value);
      var periodo=y.getdate()-x.getdate();
          alert("periodo="+periodo)
          
    }
  </script>
	<div class="col-md-12">
    <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Crear un nuevo acuerdo de comisión. (Solicitud)</h3>
        </div>
        <script type="text/javascript">
          function valida(){
            var 
          }
        </script>
        <form class="form-horizontal" method="POST" action="{{route('comision.store')}}" onsubmit="return valida(this)">
            {{ csrf_field() }}
          <div class="box-body">
            <div class="col-sm-10">
		        <div class="col-sm-2 control-label">
              <label for="">No:</label>
            </div>
            <div class="col-sm-4">
              <input type="number" name="no" class="form-control" placeholder="Ingresa el numero de la comision. <Se crea automaticamente>" value="{{$no}}">
		        </div>
		        <div class="col-sm-2 control-label">
              <label for="">Fecha oficio:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechaof" class="form-control" placeholder="Ingresa la fecha del oficio de comision.">
		        </div> 
            </div>       
          </div>
          <div class="box-body">
            <div class="col-sm-10">
            <div class="col-sm-2 control-label">
              <label for="">Fecha Inicio:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechain" class="form-control" placeholder="Ingrese la fecha de Inicio de la comision" id="inicioC">
            </div>
            <div class="col-sm-2 control-label">
              <label for="">Fecha final de la comisión:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechafin" class="form-control" placeholder="Ingresa la fecha final de la comision." id="finalC">
            </div> 
            </div>       
          </div>
          <div class="box-body">
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Empleado: </label>
              </div>
              <div class="col-sm-10">
                
                  @foreach($empleados as $emp)
                     @if($emp->id == $empleado_id)
                       <input type="text" class="form-control" disable placeholder="Elige el empleado." value="{{$emp->NOMBRE_COMPLETO}}" >
                     @endif
                  @endforeach
                
              </div>
            </div> 
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Lugar de origen de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="ORIGEN" class="form-control" placeholder="Ingresa el CLUES, MAOS o Ciudad de donde partiras." value="{{ $origen}}" id="origen">  
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Lugar de destino de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="DESTINO" class="form-control" placeholder="Ingresa el CLUES, MAOS o Ciudad a donde llegaras." value="{{ $destino}}" id="destino"> 
              </div>
            </div>
            <!-- Otra Linea -->    
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">kilometraje a recorrer (Km)</label>
              </div>
              <div class="col-sm-10">
                @foreach($lugard as $emp)
                   @if($emp->NombreO == $destino)
                     <input type="text" class="form-control" disable placeholder="kilometraje." value="{{$emp->km}}">
                   @endif
                @endforeach
                @if($destino == "")
                     <input type="text" class="form-control" placeholder="Indique el kilometraje.">
                @endif  
                <button type="button" onclick="ruta_google();"> Para calcular la ruta seleccionada de clic aquí, luego en el enlace.</button>
                <a target="_blank" href="https://www.google.com.mx/maps/dir/17.5338657,-99.4947898/17.5342549,-99.4913194/@17.5333596,-99.4943691,17z/data=!3m1!4b1!4m2!4m1!3e0" id="rutagoogle"> Ver Cálculo Distancia</a>
                <p id="demo"></p>
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Motivo u objeto de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <textarea name="objetivo" rows="3" cols="80">
                </textarea>  
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Tarifa a utilizar:</label>
              </div>
              <div class="col-sm-10"> 
                <select class="form-control select2" style="width: 100%;" name="DESTINO">
  
                @foreach($tarifas as $t)
                     <option value="{{$t->id}}">{{$t->concepto}} Grupo J.: {{$t->grupoj}} Tarifa: {{$t->tarifa}} Tarifa 50%: {{$t->tarifa50}} Tipo C.: {{$t->tipocom}} Moneda: {{$t->moneda}}</option>
                @endforeach

                </select>
              </div>
            </div>
            
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Monto a solicitar de viaticos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="viaticos" id="monto" class="form-control" placeholder="Monto_autorizado * numero_de_días."> 
                <button type="button" onclick="montoviaticos();"> Para calcular el monto segun días de comisión de clic aquí.</button>
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Monto a solicitar de pasajes Foraneos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="pasajes" class="form-control" placeholder="Ingresa el monto de pasajes foraneos."> 
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Monto a solicitar de combustible:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="combustible" class="form-control" placeholder="Ingresa el monto de combustible."> 
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="">Monto a solicitar para otros gastos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="combustible" class="form-control" placeholder="Ingresa el monto de combustible."> 
              </div>
            </div>
          </div>
              <!-- /.box-body -->
          <div class="box-footer col-sm-4">
            <input type="hidden" id="FiltroN" value="{{ $filtroN }}">
            @if(isset($empleado_id) && $empleado_id != 0)
            <input type="submit" class="btn btn-primary "  value="Guardar">
            @endif
          </div>
        </form>
        <!-- /.box-footer-->
    </div>
  </div>


@endsection

