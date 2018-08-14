@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('content')

    @include('alerts.success')
       <div class="container">
          <h3><p>Bienvenido  {{ Auth::user()->name }}. aqui encontraras tu expediente electrónico, corrige o sube los archivos necesarios. <br> Si tienen algún comentario al respecto puedes realizarlo en el área de Recursos Humanos, Gracias. 
            </p> <br>                  
          </h3>
          <h4>Actualiza los archivos que consideres deban ser actualizados.</h4>
        </div>  

      <section id="info">
        <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    Fotografia<br>
                    En formato JPG (imagen) hasta 1Mb. de tamaño máximo. <br> 
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/fotografia.jpg";
                       //-- Para el orionms.com.mx debe ir apuntando a public.  
                       //$arch =  "/public/expediente/" . $RFC . "/fotografia.jpg"; 
                       $arch =  "/expediente/" . $RFC . "/fotografia.jpg";
                    ?> 
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="fotografia." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'fotografia.jpg') }}"> Fotografia</a><br>                     
                    @endif
                  <div >    
                    <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="file" class="form-control" name="arch" required>
                      <input type="hidden" name="RFC" value="{{$RFC}}">
                      <input type="hidden" name="name" value="fotografia.jpg">
                      <button class="btn btn-primary" type="submit">Subir</button>
                    </form> 
                  </div>    
                </div>  
              </div>
        </div>   
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default"> 
              <div class="panel-body">
                    Credencial Elector <br> 
                    En formato JPG (imagen) hasta 1Mb. de tamaño máximo. <br>
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/credencialINE.jpg";
                       $arch =  "/expediente/" . $RFC . "/credencialINE.jpg";
                    ?>
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="credencialINE." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'credencialINE.jpg') }}"> INE</a><br> 
                    @endif
                    <div >    
                      <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" class="form-control" name="arch" required>
                        <input type="hidden" name="RFC" value="{{$RFC}}">
                        <input type="hidden" name="name" value="credencialINE.jpg">
                        <button class="btn btn-primary" type="submit">Subir</button>
                      </form> 
                    </div>   
              </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    Cédula Profesional (si aplica) <br> 
                    En formato JPG (imagen) hasta 1Mb. de tamaño máximo. <br>
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/cedula_profesional.jpg";
                       $arch =  "/expediente/" . $RFC . "/cedula_profesional.jpg";
                    ?>
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="cedula_profesional." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'cedula_profesional.jpg') }}"> Cedula Profesional</a><br> 
                    @endif
                    <div >    
                      <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" class="form-control" name="arch" required>
                        <input type="hidden" name="RFC" value="{{$RFC}}">
                        <input type="hidden" name="name" value="cedula_profesional.jpg">
                        <button class="btn btn-primary" type="submit">Subir</button>
                      </form> 
                    </div> 
                </div>
              </div>
          </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    Curriculum Vitae <br> 
                    En formato PDF (documento) hasta 1Mb. de tamaño máximo. <br>
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/curriculumvitae.pdf";
                       $arch =  "/expediente/" . $RFC . "/curriculumvitae.pdf";
                    ?>
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="curriculumvitae." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'curriculumvitae.pdf') }}"> Curriculum Vite</a><br> 
                    @endif
                    <div >    
                      <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" class="form-control" name="arch" required>
                        <input type="hidden" name="RFC" value="{{$RFC}}">
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                        <input type="hidden" name="name" value="curriculumvitae.pdf">
                        <button class="btn btn-primary" type="submit">Subir</button>
                      </form> 
                    </div> 
                </div>
              </div>
          </div>  
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    CURP <br> 
                    En formato JPG (imagen) hasta 1Mb. de tamaño máximo. <br>  
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/CURP.jpg";
                       $arch =  "/expediente/" . $RFC . "/CURP.jpg";
                    ?>
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="CURP." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'CURP.jpg') }}"> CURP</a><br> 
                    @endif
                    <div >    
                      <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" class="form-control" name="arch" required>
                        <input type="hidden" name="RFC" value="{{$RFC}}">
                        <input type="hidden" name="name" value="CURP.jpg">
                        <button class="btn btn-primary" type="submit">Subir</button>
                      </form> 
                    </div> 
                </div>
              </div>
          </div>  
          <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default"> 

                <div class="panel-body">
                    Registro Federal de Contribuyentes RFC <br> 
                    En formato JPG (imagen) hasta 1Mb. de tamaño máximo. <br>
                    <?php 
                       $dir = public_path() . "/expediente/" . $RFC . "/RFC.jpg";
                       $arch =  "/expediente/" . $RFC . "/RFC.jpg";
                    ?>
                    @if(file_exists($dir)) 
                      <img src="{{$arch}}" alt="RFC." width="200px" height="150px"><br>
                      <a href= "{{ route('downloadArch', 'RFC.jpg') }}"> RFC</a><br> 
                    @endif
                    <div >    
                      <form method="POST" action="/empleados/GuardarDOC" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" class="form-control" name="arch" required>
                        <input type="hidden" name="RFC" value="{{$RFC}}">
                        <input type="hidden" name="name" value="RFC.jpg">
                        <button class="btn btn-primary" type="submit">Subir</button>
                      </form> 
                    </div> 
                </div>
              </div>
          </div>                          
        </div>        
      </section>  
   
       <section id="info"> 
          <?php
          $dir = public_path() . "/expediente/" . $RFC;
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
                    $cual= $archivo;
                    ?>
                    
                    <a href="{{ route('downloadArch', $cual) }}" class="btn btn-link"><span class="oi oi-eye"></span>Descargar</a> <br>
                    <?php 
                }
            }
          }
          ?>          
       </section>
 @endsection