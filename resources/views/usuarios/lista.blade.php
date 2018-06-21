@extends('layouts.admin')

@section('content')
  <section class="content">
    @include('alerts.success')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3   class="box-title">Lista de Usuarios</h3>
        </div>
        <div class="box-body">
          <table class="table">
            <thead>
              <tr>
             <th>Nombre</th>
             <th>Email</th>
             <th>Tipo</th>
             <th>Avatar</th>
             <th>Acciones</th>
             </tr>
            </thead>

              @foreach($users as $usr)
            <tbody>              
              <td>{{$usr->name}}</td>
              <td>{{$usr->email}}</td>
              <td>{{$usr->tipo}}</td>
              <td>
                @if(!empty($usr->imagen))
                  {{header("Content-type: image/jpeg")}} 
                  <img src="{{'data:image/jpg' . ';base64,' . base64_encode( $usr->imagen)}}" alt="avatar" style="width: 50px; height: 70px;">
                @endif
                  <form action="{{ route('subirAvatar') }}" method="GET">
                    <input type="hidden" name="id" value="{{$usr->id}}"></input>
                    <button class="btn btn-success" type="submit">Leer</button>
                  </form>
              </td>
              <!-- Boton Editar -->
              <td>
                <div style="display: inline-block; padding: 0px; border: hidden; margin: 0px; ">
                  <div style="border: hidden; display: inline-block; border: none; color: white; padding: 0px 0px; text-decoration: none; margin: 4px 2px; cursor: pointer;">

                   <a href="{{ route('usuarios.edit',['id'=>$usr->id]) }}" class="btn btn-success" >Editar</a>
                  </div>
                  @if(Auth::user()->tipo == "ADMIN")
                  <!-- Boton Borrar -->
                  <div style="padding-left: 5px; border: hidden; display: inline-block; ">
                    {!!Form::open(['route'=>['usuarios.destroy',$usr->id],'method'=>'DELETE'])!!}
                       {!!Form::submit('Borrar', ['class'=>'btn btn-danger','onclick'=>'return confirm("Esta seguro de borrar al usuario ?")'])!!}
                    {!!Form::close()!!} 
                  </div>
                  @endif
                 </div>
              </td>
        </tbody>              
        @endforeach

        </table>
        </div>
        <!-- /.box-body -->
        @if(Auth::user()->tipo == "ADMIN")
          <div class="box-footer">
              <div class="list-inline" > {!! $users->render() !!}</div> 
              <div><a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear</a></div>
          </div>
        @endif 
        <!-- /.box-footer-->
      </div>
  </section>


@endsection

@section('content-header')
  <section class="content-header">
      <h1>
        Usuarios que administrar el Sitio SISMOS <br>
        <small>Utilice esta sección para modificar, agregar o dar permisos a los usuarios.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>
@endsection