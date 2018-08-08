@extends ('Layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Nueva comision
        <small>Indique los datos necesarios para su nueva comisionUtilize estos valores para organizar las peticiones.</small>
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
    <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Crear un nuevo acuerdo de comision. (Solicitud)</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('comision.store')}}">
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
              <label for="">Fecha Oficio:</label>
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
              <input type="date" name="fechain" class="form-control" placeholder="Ingrese la fecha de Inicio de la comision">
            </div>
            <div class="col-sm-2 control-label">
              <label for="">Fecha final de la comision:</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="fechafin" class="form-control" placeholder="Ingresa la fecha final de la comision.">
            </div> 
            </div>       
          </div>
          <div class="box-body">
            <div class="col-sm-10">
            <div class="col-sm-2 control-label">
              <label for="">Empleado:</label>
            </div>
            <div class="col-sm-8">
              <select class="col-sm-12" name="empleado_id">
                @foreach($empleados as $emp)
                   @if($emp->id==\Auth::user()->usuario_id)
                     <option value="{{$emp->id}}" selected>{{$emp->NOMBRE_COMPLETO}}</option>
                   @else
                     <option value="{{$emp->id}}">{{$emp->NOMBRE_COMPLETO}}</option>
                   @endif
                @endforeach
              </select>
            </div>

            </div> 
            <div class="col-sm-10">
            <div class="col-sm-2 control-label">
              <label for="">Fecha final de la comision:</label>
            </div>
            <div class="col-sm-8">
              <input type="date" name="fechafin" class="form-control" placeholder="Ingresa la fecha final de la comision.">
            </div>
            </div>                   
          </div>
              <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
        </form>
        <!-- /.box-footer-->
    </div>
  </div>
@endsection

