@extends ('layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Nueva comisión <br>
        <small>Indique los datos necesarios para su nueva comisión.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Comision</a></li>
        <li class="active">Acuerdos</li>
      </ol>
    </section>
@endsection

@section ('content')

  @if (session()->has('message'))
    @include('alerts.alerta')
  @endif
  <!-- Edicion de la comision  -->

  <div class="col-md-12">
    <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Edición del acuerdo de comisión. (Solicitud)</h3>
        </div>
        <script type="text/javascript">
          function valida(){
            var 
          }
        </script>
        <form class="form-horizontal" method="POST" action="{{route('comision.update', $com->id)}}" onsubmit="return valida(this)">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
          <div class="box-body">
            <div class="col-sm-10">
            <div class="col-sm-2 control-label">
              <label for="no">No:</label>
            </div>
            <div class="col-sm-4">
              <input type="number" name="no" class="form-control"  value="{{ $com->no }}" disabled>
            </div>
            <div class="col-sm-2 control-label">
              <label for="fechaof">Fecha oficio:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechaof" class="form-control" placeholder="Ingresa la fecha del oficio de comision." value="{{$com->fechaof}}" disabled="No puede editar este campo">
            </div> 
            </div>       
          </div>
          <div class="box-body">
            <div class="col-sm-10">
            <div class="col-sm-2 control-label">
              <label for="fechainc">Fecha Inicio:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechainc" class="form-control" placeholder="Ingrese la fecha de Inicio de la comision" id="inicioC" value="{{$com->fechainc}}" disabled>
            </div>
            <div class="col-sm-2 control-label">
              <label for="fechafinc">Fecha final de la comisión:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechafinc" class="form-control" placeholder="Ingresa la fecha final de la comision." id="finalC" value="{{$com->fechafinc}}" disabled>
            </div> 
            </div>       
          </div>
          <div class="box-body">

            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="origen">Lugar de origen de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="origen" class="form-control" placeholder="Ingresa el CLUES, MAOS o Ciudad de donde partiras." value="{{ $com->origen}}" disabled>  
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="destino">Lugar de destino de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="destino" class="form-control" placeholder="Ingresa el CLUES, MAOS o Ciudad a donde llegaras." value="{{ $com->destino}}" disabled> 
              </div>
            </div>
            <!-- Otra Linea -->    
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="km">kilometraje a recorrer (Km)</label>
              </div>
              <div class="col-sm-10">
                     <input type="text" name="km"  class="form-control" placeholder="kilometraje." value="{{$com->km}}" disabled>

                <a target="_blank" href="https://www.google.com.mx/maps/dir/17.5338657,-99.4947898/17.5342549,-99.4913194/@17.5333596,-99.4943691,17z/data=!3m1!4b1!4m2!4m1!3e0" id="rutagoogle"> Ver Cálculo Distancia</a>
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="objetivo">Motivo u objeto de la comisión:</label>
              </div>
              <div class="col-sm-10">
                <textarea name="objetivo" rows="3" cols="80">
                   {{ $com->objetivo }}
                </textarea>  
              </div>
            </div>
            
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="viaticos">Monto a solicitar de viaticos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="viaticos" id="monto" class="form-control" placeholder="Monto_autorizado * numero_de_días." value="{{$com->viaticos}}"> 
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="pasajes">Monto a solicitar de pasajes Foraneos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="pasajes" class="form-control" placeholder="Ingresa el monto de pasajes foraneos." value="{{$com->pasajes}}"> 
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="combustible">Monto a solicitar de combustible:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="combustible" class="form-control" placeholder="Ingresa el monto de combustible." value="{{$com->combustible}}"> 
              </div>
            </div>
            <!-- Otra Linea -->
            <div class="col-sm-12">
              <div class="col-sm-2 control-label">
                <label for="otro">Monto a solicitar para otros gastos:</label>
              </div>
              <div class="col-sm-10">
                <input type="text" name="otro" class="form-control" placeholder="Ingresa el monto de combustible." value="{{$com->otro}}"> 
              </div>
            </div>
          </div>
              <!-- /.box-body -->
          <div class="box-footer col-sm-4">
            <input type="hidden" name="FiltroN" value="{{ $filtroN }}">
            <input type="submit" class="btn btn-primary "  value="Modificar">
          </div>
        </form>
        <!-- /.box-footer-->
    </div>
  </div>

  <!-- Fin de Edicion de la comision  -->
  <!-- Inicio - Se crea la lista de empleados de la comision -->
 
    <section id="blog"> 
  <table class="table table-bordered table-hover" style="width: 95%;">
    <thead>
    <tr role="row">
      <th class="sorting" aria-control="example2" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">id
      </th>
      <th>Nombre</th>
      <th>a Resguardo</th>
      <th>Tarifa</th>
      <th>ACCION</th>
    </tr>
    </thead>

    @foreach ($empleados as $row)
      <tr>
      <td> {{ $row->no }} </td> <td> {{ $row->nombre }} </td>
      <td> {{ $row->origen }} </td> <td> {{ $row->destino }} </td>
      <td> {{ $row->objetivo }} </td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('comision.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('comision.destroy', $row->id) }}" class="btn btn-link"><span class="oi oi-trash"></span></a>
      </td></tr>
    @endforeach 

  </table> 
        <div class="box-footer">
            <p>Dias:{{$periodo}}</p>
            <div><a href="{{route('comision.addemp', ['id'=>$com->id,'no'=>$com->no,'periodo'=>$periodo])}}" class="btn btn-primary">Agregar Empleado</a></div>
        </div>
  </section>   
  <script>
           
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

  <!-- Termina - Se crea la lista de empleados de la comision -->


@endsection

