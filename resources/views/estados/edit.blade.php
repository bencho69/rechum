@extends ('Layouts.admin')

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

  @if (session()->has('message'))
    @include('alerts.alerta')
  @endif
	
	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edita un Estado.</h3>
        </div>
        
        {!! Form::model($estados, ['route'=> ['estados.update', $estados->id], 'method' =>'PUT']) !!}
          <div class="box-body">
		        <div class="form_group">
              <label for="">No:</label>
              <input type="number" name="no" class="form-control" placeholder=["Ingresa el numero del año." value="{{$estados->no}}" ]>
		        </div>
		        <div class="form_group">
              <label for="">Descripción:</label>
              <input type="text" name="descripcion" class="form-control" placeholder="Ingresa el año a crear." value="{{$estados->descripcion}}">
		        </div>        
          </div>
          <input type="hidden" name="modificado" value="1"></input>
              <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
        </form>
        <!-- /.box-footer-->
    </div>
	
@endsection

