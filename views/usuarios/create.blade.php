@extends('layouts.admin')

@section('content')  
   @include('alerts.request')
   <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3  class="box-title">Crear Usuarios</h3>
      </div>
      <div class="box-body">
       	<form action="{{route('usuarios.store')}}" method="post" class="form-horizontal">
           <div class="form-group">
           	   <label class="control-label col-sm-2">Nombre:</label>
               <div class="col-sm-10">
           	      <input type="text" name="name" class="form-control" placeholder="Escribe tu nombre">
               </div>
           </div>
           <div class="form-group">
           	   <label class="control-label col-sm-2" for="email">Correo:</label>
               <div class="col-sm-10">
           	      <input type="text" name="email" class="form-control" placeholder="Escribe tu email">
               </div>
           </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Tipo usario:</label>
               <div class="col-sm-10">
                  <input type="radio" name="tipo" value="ADMIN"> Administrador <br>
                  <input type="radio" name="tipo" value="USR" checked> Usuario estandar
               </div>
           </div>
           <div class="form-group">
           	   <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
               <div class="col-sm-10">
                 <input type="password" name="password" class="form-control" placeholder="Escribe tu contraseña">
               </div>
           </div>
          
           {{ csrf_field() }} 

           <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
           </div>
       	</form>
      </div>
    </div>
   </section>
@endsection


