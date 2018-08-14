@extends('layouts.admin')

@section('content')
       <div class="container">
          <h3><p>Bienvenido  {{ $empleado->NOMBRE_COMPLETO }} tu RFC es: {{ $empleado->RFC }} Si no eres tu por favor sal de este formulario, Gracias. 
            </p> <br>
            <a href="/logout" class="btn btn-success">No soy esta persona</a>
             @if ($accion==0)
                 <a href='/logout' class='btn btn-success' id='bsalir' style='display:none'>Mis datos estan bien.</a>
              @else
                 <a href='/logout' class='btn btn-success' id='bsalir'>Mis datos estan bien.</a>
              @endif                     
          </h3>
          <h4>Actualiza los datos que consideres deban ser actualizados.</h4>
          <!-- <form action="/empleados/{{$empleado->id}}" method="post" > -->
          {!! Form::model($empleado, ['route'=> ['empleados.update', $empleado->id], 'method' =>'PUT']) !!}  
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombre">Nombre: (<code style="color:DodgerBlue;"> {{ $empleado->NOMBRE_COMPLETO }} </code>)</label>
            </div>
            <div  class="form-inline">
              <div class="form-group col-sm-3">
                 <label for="CURP">CURP: (<code style="color:DodgerBlue;"> {{ $empleado->CURP }}</code>)</label>
                 <input type="text" class="form-control" name="CURP" placeholder="Sus clave CURP." value="{{ $empleado->CURP }}">
              </div>
              <div class="form-group col-sm-3">
                 <label for="ESCOLARIDAD">Escolaridad: (<code style="color:DodgerBlue;"> {{ $empleado->ESCOLARIDAD }} </code>)</label>
                 <select name="ESCOLARIDAD" class="form-control" required>
                  @foreach ($nivelesc as $nives => $ne)
                     @if($ne==$empleado->ESCOLARIDAD)
                      echo "<option value='{{$ne}}' selected>{{$ne}}</option>";  
                     @else
                      echo "<option value='{{$ne}}'>{{$ne}}</option>"; 
                     @endif
                  @endforeach   
                  </select>
              </div>
              <div class="form-group col-sm-3">
                 <label for="CALLE">Calle: (<code style="color:DodgerBlue;">{{ $empleado->CALLE }} </code>)</label>
                 <input type="text" class="form-control" name="CALLE" placeholder="Nombre de la Calle donde vive." value="{{ $empleado->CALLE }} ">
              </div>           
              <div class="form-group col-sm-2">
                 <label for="NuMERO">Numero: (<code style="color:DodgerBlue;">{{ $empleado->NuMERO }}</code>)</label>
                 <input type="text" class="form-control" name="NuMERO" placeholder="Numero de la Casa y/o no interior." value="{{ $empleado->NuMERO }}">
              </div> 
            </div>
            <div  class="form-inline">
              <div class="form-group col-sm-3">
                 <label for="COLONIA">Colonia: (<code style="color:DodgerBlue;">{{ $empleado->COLONIA }}</code>)</label>
                 <input type="text" class="form-control" name="COLONIA" placeholder="Nombre de la Colonia o barrio." value="{{ $empleado->COLONIA }}">
              </div>             
              <div class="form-group col-sm-3">
                 <label for="copigop">C&oacutedigo Postal: (<code style="color:DodgerBlue;">{{ $empleado->copigop }}</code>)</label>
                 <input type="text" class="form-control" name="copigop" placeholder="Codigo postal" value=" {{ $empleado->copigop }}">
              </div>             
              <div class="form-group col-sm-3">
                 <label for="CIUDAD">Ciudad: (<code style="color:DodgerBlue;">{{ $empleado->CIUDAD }}</code>)</label>
                 <input type="text" class="form-control" name="CIUDAD" placeholder="Nombre de la Ciudad" value=" {{ $empleado->CIUDAD }}">
              </div>  
              <div class="form-group col-sm-2">
                 <label for="ENTFED">Entidad Federativa: (<code style="color:DodgerBlue;">{{ $empleado->ENTFED }}</code>)</label>
                 <input type="text" class="form-control" name="ENTFED" placeholder="Nombre de la entidad federativa." value=" {{ $empleado->ENTFED }}">
              </div>       
            </div>   
            <div  class="form-inline">   
            <fieldset class="form-group">
              <legend>Informacíon Personal:</legend>
              
            <div class="form-group col-sm-3">
               <label for="EDOCIVIL">Estado Civil: (<code style="color:DodgerBlue;">{{ $empleado->EDOCIVIL }}</code>) </label> <br>
               <?php if ( $empleado->EDOCIVIL =="CASADO")  
                        echo "<input type='radio' name='EDOCIVIL' value='CASADO' checked> CASADO<br>"; 
                     else 
                        echo "<input type='radio' name='EDOCIVIL' value='CASADO'> CASADO<br>";
                     if ($empleado->EDOCIVIL == "SOLTERO") echo "<input type='radio' name='EDOCIVIL' value='SOLTERO' checked> SOLTERO<br>"; 
                     else echo "<input type='radio' name='EDOCIVIL' value='SOLTERO'> SOLTERO<br>";
                     if ($empleado->EDOCIVIL == "DIVORCIADO") echo "<input type='radio' name='EDOCIVIL' value='DIVORCIADO' checked> DIVORCIADO<br>" ;
                     else echo "<input type='radio' name='EDOCIVIL' value='DIVORCIADO'> DIVORCIADO<br>";
                     if ($empleado->EDOCIVIL == "SIN DATOS") echo "<input type='radio' name='EDOCIVIL' value='SIN DATOS' checked> SIN DATOS<br>"; 
                     else echo "<input type='radio' name='EDOCIVIL' value='SIN DATOS'> SIN DATOS<br>";
              ?>                      
            </div> 
            <div class="form-group col-sm-3">
               <label for="SEXOFM">SEXO: (<code style="color:DodgerBlue;"><?php echo $empleado->SEXOFM; ?></code>)</label> <br>
               <?php if ($empleado->SEXOFM == "MASCULINO")  
                        echo "<input type='radio' name='SEXOFM' value='MASCULINO' checked> MASCULINO<br>"; 
                     else 
                        echo "<input type='radio' name='SEXOFM' value='MASCULINO'> MASCULINO<br>";
                     if ($empleado->SEXOFM == "FEMENINO") echo "<input type='radio' name='SEXOFM' value='FEMENINO' checked> FEMENINO<br>"; 
                     else echo "<input type='radio' name='SEXOFM' value='FEMENINO'> FEMENINO<br>";
                     if ($empleado->SEXOFM == "SIN DATOS") echo "<input type='radio' name='SEXOFM' value='SIN DATOS' checked> SIN DATOS<br>" ;
                     else echo "<input type='radio' name='SEXOFM' value='SIN DATOS'> SIN DATOS<br>";                    
              ?> 
            </div>
              <div class="form-group col-sm-4" style="">

              </div>
            <div class="form-group col-sm-3">
               <label for="NOHIJOS">Numero de hijos: (<code style="color:DodgerBlue;"><?php echo $empleado->NOHIJOS; ?></code>)</label>
               <input type="text" class="form-control" name="NOHIJOS" placeholder="Cantidad de hijos que tiene." value="<?php echo $empleado->NOHIJOS; ?>">

               <label for="FACTORRH">Tipo de sangre y factor rh: (<code style="color:DodgerBlue;"><?php echo $empleado->FACTORRH; ?></code>)</label>
               <input type="text" class="form-control" name="FACTORRH" placeholder="Tipo de sangre ej. O+" value="<?php echo $empleado->FACTORRH; ?>">
            </div>
   
 
            <div class="form-group col-sm-6">
               <label for="CORREOE">Correo Electr&oacutenico: (<code style="color:DodgerBlue;"><?php echo $empleado->CORREOE; ?></code>)</label>
               <input type="text" class="form-control" name="CORREOE" placeholder="Correo elecrtónico ej. cuenta@servidor.com.mx" value="<?php echo $empleado->CORREOE; ?>" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOCONT" >Tel&eacutefono de contacto de Casa con lada: (<code style="color:DodgerBlue;"><?php echo $empleado->TELEFONOCONT; ?></code>)</label>
               <input type="text" class="form-control" name="TELEFONOCONT" placeholder="Teléfono de casa al cual comunicarse." value="<?php echo $empleado->TELEFONOCONT; ?>">
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOCEL">Tel&eacutefono Celular: (<code style="color:DodgerBlue;"><?php echo $empleado->TELEFONOCEL; ?></code>)</label>
               <input type="text" class="form-control" name="TELEFONOCEL" placeholder="Su teléfono personal o celular" value="<?php echo $empleado->TELEFONOCEL; ?>">
            </div>
            <div class="form-group col-sm-6">
               <label for="nombrepllamar">Nombre de la persona a llamar en caso de emergencia: (<code style="color:DodgerBlue;"><?php echo $empleado->nombrepllamar; ?></code>)</label>
               <input type="text" class="form-control" name="nombrepllamar" placeholder="Nombre de la persona a llamar en caso de emergencia" value="<?php echo $empleado->nombrepllamar; ?>" required>
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOMERGENCIA">Tel&eacutefono de Emergencia: (<code style="color:DodgerBlue;"><?php echo $empleado->TELEFONOMERGENCIA; ?></code>)</label>
               <input type="text" class="form-control" name="TELEFONOMERGENCIA" placeholder="Teléfono/s de emergencia al cual llamar en caso de emergencia." value="<?php echo $empleado->TELEFONOMERGENCIA; ?>" required>
            </div>     
                   </fieldset>
          </div>   
            <input type="hidden" name="RFC" value="<?php echo $empleado->RFC; ?>">
            <input type="hidden" name="NOMBRE_COMPLETO" value="<?php echo $empleado->NOMBRE_COMPLETO; ?>"> 
            <input type="hidden" name="accion" value="1">        
            <input class="btn btn-primary" type="submit" value="Actualizar y Guardar">
          </form>  
</section>
<?php 
                            if ($accion==0){
                               echo "<a href='/logout' class='btn btn-success' id='bsalir' style='display:none'>Salir sin Guardar..</a>";
                            }  
                            else{
                               echo "<a href='/logout' class='btn btn-success' id='bsalir'>Salir sin Guardar.</a>";
                            };   
                          ?>   
   <section id="info"> 
          
       </div>
 
 @endsection