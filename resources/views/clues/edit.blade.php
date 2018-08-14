@extends('layouts.admin')

@section('content')

       <div class="container">
          <h3><p>Este es el Catálogo Unico de Establecimientos de Salud. (CAUSES). 
            </p> <br>                     
          </h3>
          <h4>Realiza los cambios que consideres.</h4>
  
          {!! Form::model($clues, ['route' => ['clues.update', $clues->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}  
            
             <div  class="form-horizontal col-sm-12">
            <div class="form-group col-sm-6">
                <label for="CLUES">CLUES: (<code style="color:DodgerBlue;"> {{ $clues->CLUES }} </code>)</label>
                <input type="text" class="form-control " name="CLUES" placeholder="Clave CLUES." value="{{ $clues->CLUES }}">
            </div>
           
              <div class="form-group col-sm-6">
                 <label for="nombreu">Nombre de la Unidad: (<code style="color:DodgerBlue;"> {{ $clues->nombreu }}</code>)</label>
                 <input type="text" class="form-control" name="nombreu" placeholder="Escriba el nombre de la unidad." value="{{ $clues->nombreu }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="localidad">Localidad: (<code style="color:DodgerBlue;"> {{ $clues->localidad }} </code>)</label>
                 <input type="text" class="form-control" name="localidad" placeholder="Nombre de la localidad del clues." value="{{  $clues->localidad }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="km">Distancia de Chilpancingo a este CLUES en Kilometros: (<code style="color:DodgerBlue;"> {{ $clues->km }} </code>)</label>
                 <input type="text" class="form-control" name="km" placeholder="Distancia en kilometros desde chilpancingo." value="{{  $clues->km }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="municipio">Municipio: (<code style="color:DodgerBlue;"> {{ $clues->municipio }} </code>)</label>
                 <input type="text" class="form-control" name="municipio" placeholder="Nombre del Municipio." value="{{  $clues->municipio }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="region">Nombre del la region: (<code style="color:DodgerBlue;"> {{ $clues->region }} </code>)</label>
                 <input type="text" class="form-control" name="region" placeholder="Nombre de la region." value="{{  $clues->region }}">
              </div> 
              <div class="form-group col-sm-4">
              <label for="nombre_contrato">Tipo de unidad: (<code style="color:DodgerBlue;"><?php echo $clues->tipou; ?></code>)</label><br>
               <?php if ($clues->tipou == "URBANA")  
                        echo "<input type='radio' name='tipou' value='URBANA' checked> URBANA<br>"; 
                     else 
                        echo "<input type='radio' name='tipou' value='URBANA'> URBANA<br>";
                     if ($clues->tipou == "RURAL") echo "<input type='radio' name='tipou' value='RURAL' checked> RURAL<br>"; 
                     else echo "<input type='radio' name='tipou' value='RUTAL'> RURAL<br>";
                     if ($clues->tipou == "SIN DATOS") echo "<input type='radio' name='tipou' value='SIN DATOS' checked> SIN DATOS<br>" ;
                     else echo "<input type='radio' name='tipou' value='SIN DATOS'> SIN DATOS<br>";              
              ?>      
              </div>  
              <div class="form-group col-sm-4">
               <label for="compfis">Expiden comprobantes Fiscales en esa localidad: (<code style="color:DodgerBlue;">{{ $clues->compfis }}</code>)? </label> <br>
               <?php if ( $clues->compfis =="SI")  
                        echo "<input type='radio' name='compfis' value='SI' checked> SI<br>"; 
                     else 
                        echo "<input type='radio' name='compfis' value='SI'> SI<br>";
                     if ($clues->compfis == "NO") echo "<input type='radio' name='compfis' value='NO' checked> NO<br>"; 
                     else echo "<input type='radio' name='compfis' value='NO'> NO<br>";
              ?>                      
                </div>        
            </div>
            <input type="hidden" name="filtro" value="{{$filtro}}">
            <input type="hidden" name="filtroL" value="{{$filtroL}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">       
            <input class="btn btn-primary" type="submit" value="Actualizar y Guardar">
          </form>  

          <?php 
            echo "<a href='/logout' class='btn btn-success' id='bsalir' style='display:none'>Salir sin Guardar..</a>";
          ?>   
       </div>
 
 @endsection