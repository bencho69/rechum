@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@endsection

@section('content')
       <div class="container">
          <h3><p>Bienvenido  {{ Auth::user()->name }}. aqui encontraras tu expediente electrónico, corrige, o sube los archivos necesarios. <br> Si tienen algún comentario al respecto puedes realizarlo en el área de Recursos Humanos, Gracias. 
            </p> <br>                  
          </h3>
          <h4>Actualiza los archivos que consideres deban ser actualizados.</h4>
        </div>  

      <section id="info">
        <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-body">
                    Fotografia
                    <?php 
                       $dir = public_path() . "\\expediente\\" . $RFC . "\\fotografia.jpg";
                   
                       if(file_exists ($dir )){

                       }
                    ?>
                    @if(file_exists($dir))
                      {{header("Content-type: image/jpeg")}} 
                      <img src="{{'data:image/jpg' . ';base64,' . base64_encode( $dir)}}" alt="fotografia.">

                    @else
                <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype=”multipart/form-data”>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="file" class="form-control" name="file" >
                  <input type="hidden" name="RFC" value="{{$RFC}}">
                  <input type="hidden" name="name" value="fotografia.jpg">
                  <button class="btn btn-primary" type="submit">Subir</button>
                </form> 
                    @endif

        
            </div>
        </div>   
        <div class="col-md-3 ">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    Credencial Elector

                <form action="{{ asset('/guardarDOC') }}" class="dropzone" id="my-awesome-dropzone">
                  {{ csrf_field() }}
                  <input type="hidden" name="RFC" value="{{$RFC}}">
                  <input type="hidden" name="name" value="fotografia">
                </form>
                </div>
              </div>
          </div>
        <div class="col-md-3 ">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    Comprobante de Estudios

                <form action="{{ asset('/guardarDOC') }}" class="dropzone" id="my-awesome-dropzone">
                  {{ csrf_field() }}
                  
                  <input type="hidden" name="RFC" value="{{$RFC}}">
                  <input type="hidden" name="name" value="fotografia">
                </form>
                </div>
              </div>
          </div>
        </div>        
      </section>  
   
       <section id="info"> 
          <?php
          $dir = public_path() . "\\expediente\\" . $RFC;
          if (is_dir($dir) && ($directorio=opendir($dir))){
            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
            {
                if (is_dir($archivo))//verificamos si es o no un directorio
                {
                    //echo "[" . $archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
                }
                else
                { 
                    echo "<a href= " . "'" . "/expediente/" . $RFC . "/" . $archivo . "'>" .$archivo. "</a> "; 
                    ?>
                    <a href="{{ route('download', $archivo) }}" class="btn btn-link"><span class="oi oi-eye"></span>Descargar</a> <br>
                    <?php 
                }
            }
          }
          ?>          
       </section>
 @endsection