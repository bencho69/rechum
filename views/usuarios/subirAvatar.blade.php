@extends ('layouts.admin')
 
@section('content')
 
<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar Imagen del perfil</div>
        <div class="panel-body">
          <form method="POST" action="/temp/crearAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Imagen del Avatar {{$id}}</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
                <input type="hidden" name="id" value="{!!$id!!}"></input>
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection