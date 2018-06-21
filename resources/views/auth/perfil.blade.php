@extends('layouts.admin')

@section('content')
  <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3   class="box-title">Perfil del Usuario</h3>
        </div>
        <div class="box-body">
          <table class="table">
            <thead>
              <tr>
               <th>Nombre</th>
               <th>Email</th>
               <th>Avatar</th>
             </tr>
            </thead>
                <tbody>

                  <td>{!!$user->name!!}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @if(!empty($user->imagen))
                      {{header("Content-type: image/jpeg")}} 
                      <img src="{{'data:image/jpg' . ';base64,' . base64_encode( $user->imagen)}}" alt="">
                    @endif
                      <form action="{{ route('subirAvatar') }}" method="GET">
                        <input type="hidden" name="id" value="{{$user->id}}"></input>
                        <button class="btn btn-success" type="submit">Subir</button>
                      </form>
                  </td>
                  <!-- Boton Editar -->
                  <td>
                    <div style="display: inline-block; padding: 0px; border: hidden; margin: 0px; ">
                      <div style="border: hidden; display: inline-block; border: none; color: white; padding: 0px 0px; text-decoration: none; margin: 4px 2px; cursor: pointer;">

                       <a href="{{ route('edit',['id'=>$user->id]) }}" class="btn btn-success" >Editar</a>
                      </div>
                     </div>
                  </td>
                </tbody>

          </table>
        </div>
      </div>
  </section>
@endsection

@section('content-header')
  <section class="content-header">
      <h1>
        Cambie su perfil
        <small>Utilice esta sección para modificar su perfil.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>
@endsection