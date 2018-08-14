@extends('layouts.admin')

@section('content')

       <div class="container">
          <h3><p>Este es el catálogo autorizado de Modulos de Afiliación y Orientación. 
            </p> <br>                     
          </h3>
          <h4>Realiza los cambios que consideres.</h4>
  
          {!! Form::model($mao, ['route' => ['maos.update', $mao->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}  
            
             <div  class="form-horizontal col-sm-12">
            <div class="form-group col-sm-6">
                <label for="no">No: (<code style="color:DodgerBlue;"> {{ $mao->no }} </code>)</label>
                <input type="no" class="form-control " name="no" placeholder="Numero." value="{{ $mao->no }}">
            </div>
           
              <div class="form-group col-sm-6">
                 <label for="clave">Clave: (<code style="color:DodgerBlue;"> {{ $mao->clave }}</code>)</label>
                 <input type="text" class="form-control" name="clave" placeholder="Sus clave clave." value="{{ $mao->clave }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="nombre">Nombre: (<code style="color:DodgerBlue;"> {{ $mao->nombre }} </code>)</label>
                 <input type="text" class="form-control" name="nombre" placeholder="Nombre del MAOS." value="{{  $mao->nombre }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="areainfluencia">areainfluencia: (<code style="color:DodgerBlue;"> {{ $mao->areainfluencia }} </code>)</label>
                 <input type="text" class="form-control" name="areainfluencia" placeholder="areainfluencia del MAOS." value="{{  $mao->areainfluencia }}">
              </div>
            </div>
            <div  class="form-inline"> <p>&nbsp</p>  
            <fieldset class="form-group col-sm-10">
              <div class="form-group col-sm-4">
               <label for="tipom">Tipo de Modulo: (<code style="color:DodgerBlue;">{{ $mao->tipom }}</code>) </label> <br>
               <?php if ( $mao->tipom =="MAO")  
                        echo "<input type='radio' name='tipom' value='MAO' checked> MAO<br>"; 
                     else 
                        echo "<input type='radio' name='tipom' value='MAO'> MAO<br>";
                     if ($mao->tipom == "MAOREGIONAL") echo "<input type='radio' name='tipom' value='MAOREGIONAL' checked> MAOREGIONAL<br>"; 
                     else echo "<input type='radio' name='tipom' value='MAOREGIONAL'> MAOREGIONAL<br>";
                     if ($mao->tipom == "NAO") echo "<input type='radio' name='tipom' value='NAO' checked> NAO<br>" ;
                     else echo "<input type='radio' name='tipom' value='NAO'> NAO<br>";
                     if ($mao->tipom == "OPD") echo "<input type='radio' name='tipom' value='OPD' checked> OPD<br>"; 
                     else echo "<input type='radio' name='tipom' value='OPD'> OPD<br>";
              ?>                      
                </div> 
              <div class="form-group col-sm-4">
               <label for="operando">Activo: (<code style="color:DodgerBlue;">{{ $mao->operando }}</code>)? </label> <br>
               <?php if ( $mao->operando =="SI")  
                        echo "<input type='radio' name='operando' value='SI' checked> SI<br>"; 
                     else 
                        echo "<input type='radio' name='operando' value='SI'> SI<br>";
                     if ($mao->operando == "NO") echo "<input type='radio' name='operando' value='NO' checked> NO<br>"; 
                     else echo "<input type='radio' name='operando' value='NO'> NO<br>";
              ?>                      
                </div>   
            <div class="form-group col-sm-4">
               <label for="turno">turno: (<code style="color:DodgerBlue;"><?php echo $mao->turno; ?></code>)</label> <br>
               <?php if ($mao->turno == "DIURNO")  
                        echo "<input type='radio' name='turno' value='DIURNO' checked> DIURNO<br>"; 
                     else 
                        echo "<input type='radio' name='turno' value='DIURNO'> DIURNO<br>";
                     if ($mao->turno == "MATUTINO") echo "<input type='radio' name='turno' value='MATUTINO' checked> MATUTINO<br>"; 
                     else echo "<input type='radio' name='turno' value='MATUTINO'> MATUTINO<br>";
                     if ($mao->turno == "VESPERTINO") echo "<input type='radio' name='turno' value='VESPERTINO' checked> VESPERTINO<br>" ;
                     else echo "<input type='radio' name='turno' value='VESPERTINO'> VESPERTINO<br>";
                     if ($mao->turno == "MIXTO") echo "<input type='radio' name='turno' value='MIXTO' checked> MIXTO<br>" ;
                     else echo "<input type='radio' name='turno' value='MIXTO'> MIXTO<br>";                    
              ?> 
            </div>      <p>&nbsp </p><br>            
              </fieldset>  
            </div>
            <div class="form-horizontal">   
            <fieldset class="form-group col-sm-12">  
              <div class="form-group col-sm-12">
                 <label for="capacidad">Capacidad: (<code style="color:DodgerBlue;"> {{ $mao->capacidad }} </code>)</label>
                 <input type="text" class="form-control" name="capacidad" placeholder="Capacidad del MAOS." value="{{  $mao->capacidad }}">
              
               <label for="nombre_contrato">Nombre de contrato: (<code style="color:DodgerBlue;"><?php echo $mao->nombre_contrato; ?></code>)</label>
               <input type="text" class="form-control" name="nombre_contrato" placeholder="Nombre del MAO para el contrato." value="<?php echo $mao->nombre_contrato; ?>">
               <br>
               <label for="nombre_contrato">Kilometros de Chilpancingo a este MAO: (<code style="color:DodgerBlue;"><?php echo $mao->km; ?></code>)</label>
               <input type="text" class="form-control" name="km" placeholder="Kilometro de Chilpancingo a este MAO." value="<?php echo $mao->km; ?>">
               <label for="nombre_contrato">Region a la que pertenece: (<code style="color:DodgerBlue;"><?php echo $mao->region; ?></code>)</label>
               <input type="text" class="form-control" name="region" placeholder="Clave y nombre de la Region a la que pertenece." value="<?php echo $mao->region; ?>">
               <label for="nombre_contrato">Tipo de unidad: (<code style="color:DodgerBlue;"><?php echo $mao->tipou; ?></code>)</label><br>
               <?php if ($mao->tipou == "URBANA")  
                        echo "<input type='radio' name='tipou' value='URBANA' checked> URBANA<br>"; 
                     else 
                        echo "<input type='radio' name='tipou' value='URBANA'> URBANA<br>";
                     if ($mao->tipou == "RURAL") echo "<input type='radio' name='tipou' value='RURAL' checked> RURAL<br>"; 
                     else echo "<input type='radio' name='tipou' value='RURAL'> RURAL<br>";
                     if ($mao->tipou == "SIN DATOS") echo "<input type='radio' name='tipou' value='SIN DATOS' checked> SIN DATOS<br>" ;
                     else echo "<input type='radio' name='tipou' value='SIN DATOS'> SIN DATOS<br>";              
              ?> 
              <label for="operando">En su área se emiten comprobantes fiscales? (<code style="color:DodgerBlue;">{{ $mao->operando }}</code>)? </label> <br>
               <?php if ( $mao->comprobante =="SI")  
                        echo "<input type='radio' name='comprobante' value='SI' checked> SI<br>"; 
                     else 
                        echo "<input type='radio' name='comprobante' value='SI'> SI<br>";
                     if ($mao->comprobante == "NO") echo "<input type='radio' name='comprobante' value='NO' checked> NO<br>"; 
                     else echo "<input type='radio' name='comprobante' value='NO'> NO<br>";
                ?> 
                <label for="nombre_contrato">Nombre de la Ciudad: (<code style="color:DodgerBlue;"><?php echo $mao->ciudad; ?></code>)</label>
               <input type="text" class="form-control" name="ciudad" placeholder="Nombre de la ciudad donde se ubica este MAO." value="<?php echo $mao->ciudad; ?>">    
               <br>
               <input type="hidden" name="accion" value="1"> 
               <input type="hidden" name="filtro" value="{{$filtro}}"> 
               <input type="hidden" name="_token" value="{{ csrf_token() }}">       
               <input class="btn btn-primary" type="submit" value="Actualizar y Guardar">
            </div>
          </fieldset>
          </div>

            
          </form>  

          <?php 
            echo "<a href='/logout' class='btn btn-success' id='bsalir' style='display:none'>Salir sin Guardar..</a>";
          ?>   
       </div>
 
 @endsection