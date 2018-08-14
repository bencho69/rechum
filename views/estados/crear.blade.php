@extends ('layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Lista de Estados
        <small>Utilize estos valores para organizar las peticiones.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Catálogos</a></li>
        <li class="active">Estados</li>
      </ol>
    </section>
@endsection

@section ('content')

  @include('alerts.success')
	
	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear un nuevo estado de trabajo.</h3>
        </div>
        <form method="POST" action="{{route('estados.store')}}">
            {{ csrf_field() }}
          <div class="box-body">
		        <div class="form_group">
              <label for="">No:</label>
              <input type="number" name="no" class="form-control" placeholder="Ingresa el numero del Estado.">
		        </div>
		        <div class="form_group">
              <label for="">Estado:</label>
              <input type="text" name="descripcion" class="form-control" placeholder="Ingresa el nombre del Estado a crear.">
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

