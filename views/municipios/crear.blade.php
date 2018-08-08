@extends ('Layouts.admin')

@section('content-header')
  <section class="content-header">
      <h1>
        Lista de Municipios
        <small>Utilize estos valores para organizar las peticiones.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Catálogos</a></li>
        <li class="active">Municipios</li>
      </ol>
    </section>
@endsection

@section ('content')

  @if (session()->has('message'))
    @include('alerts.alerta')
  @endif
	
	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crea un nuevo municipio de trabajo.</h3>
        </div>
        <form method="POST" action="{{route('municipios.store')}}" class="form-horizontal">
            {{ csrf_field() }}
          <div class="box-body">
		        <div class="form_group">
              <label class='control-label col-sm-2' for="">No:</label>
              <div class='col-sm-10'>
                <input type="number" name="no" class="form-control" placeholder="Ingresa el numero del municipio.">
              </div>
		        </div>
		        <div class="form_group">
              <label class='control-label col-sm-2' for="">Descripción:</label>
              <div class='col-sm-10'>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingresa el nombre del municipio a crear.">
              </div>
		        </div>
            <div class="form_group">
              <label class='control-label col-sm-2' for="">Color a utilizar:</label>
              <div class='col-sm-10'>
                <input type="color" name="color" class="form-control" placeholder="Ingresa el nombre del municipio a crear.">
              </div>
            </div>
            <div class="form_group">
              <div class="dropdown">
                <label class='control-label col-sm-2' for="">Entidad a utilizar:</label>
                <div class='col-sm-10'>
                  <select class="form-control" id="1" name="entidadfed">
                    <option value="" disabled selected>-- Seleccione una Entidad --</option>
                    @foreach($estados as $edo)
                      <option value="{{$edo->id}}">{{$edo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
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
	
@endsection

