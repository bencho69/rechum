@extends('layouts.admin')

@section('content')
   @include('alerts.request')
   <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3  class="box-title">Modificar al Usuario: {{$user->name}}</h3>
      </div>
      <div class="box-body">
          {!! Form::model($user, ['route' => ['usuarios.update', $user->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}

           <div class="form-group">
           	   <label class="control-label col-sm-2">Nombre:</label>
               <div class="col-sm-10">
           	      <input type="text" name="name" class="form-control" placeholder="Escribe tu nombre" value="{{$user->name}}">
               </div>
           </div>
           <div class="form-group">
           	   <label class="control-label col-sm-2" for="email">Correo:</label>
               <div class="col-sm-10">
           	      <input type="text" name="email" class="form-control" placeholder="Escribe tu email" value="{{$user->email}}">
               </div>
           </div>
           @if( $user->tipo = "ADMIN" )
            <div class="form-group">
               <label class="control-label col-sm-2">Tipo usario:</label>
               <div class="col-sm-10">
                  @if( $user->tipo == "ADMIN" )
                     <input type="radio" name="tipo" value="ADMIN"> Administrador <br>
                     <input type="radio" name="tipo" value="USR" value="{{$user->tipo}}" checked> Usuario estandar
                  @else
                     <input type="radio" name="tipo" value="ADMIN" value="{{$user->tipo}}" checked> Administrador <br>
                     <input type="radio" name="tipo" value="USR"> Usuario estandar
                  @endif
               </div>
           </div>
           @endif
           <div class="form-group">
           	   <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
               <div class="col-sm-10">
                 <input type="password" name="password" class="form-control" placeholder="Escribe tu contraseña" >
               </div>
           </div>
           {{ csrf_field() }} 

           <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
           </div>
        {!! Form::close() !!}
      </div>
    </div>
   </section>

@endsection