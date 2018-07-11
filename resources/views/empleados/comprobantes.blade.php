@extends('layouts.admin')

@section('content')
       <div class="container">
          <h3><p>Bienvenido  {{ Auth::user()->name }} tus comprobantes de pago se enlistan a continuación: Si tienen algún comentario al respecto puedes realizarlo en el área de Recursos Humanos, Gracias. 
            </p> <br>                  
          </h3>
          <h4>Actualiza los datos que consideres deban ser actualizados.</h4>
        </div>  

   
       <section id="info"> 
          <?php
          $dir = public_path() . "\comprobantes\\" . $RFC;
          if (is_dir($dir) && ($directorio=opendir($dir))){
            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
            {
                if (is_dir($archivo))//verificamos si es o no un directorio
                {
                    //echo "[" . $archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
                }
                else
                { 
                    echo "<a href= " . "'" . "/comprobantes/" . $RFC . "/" . $archivo . "'>" .$archivo. "</a> "; 
                   
                    ?>
                    <a href="{{ route('download', $archivo) }}" class="btn btn-link"><span class="oi oi-eye"></span>Descargar</a> <br>
                    
                    <?php 
                }
            }
          }
          ?>          
       </section>
 @endsection