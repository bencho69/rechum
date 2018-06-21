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
          
          <form action="" method="POST" >
            <fieldset class="form-group">
              <div class="form-horizontal form-group col-sm-3">
                  <label for="TipoContrato">Tipo de contrato: (<code style="color:DodgerBlue;"> {{ $empleado->TipoContrato }} </code>)</label>
                  <select name="TipoContrato" class="form-control">
                <?php if ( $empleado->TipoContrato == "CONFIANZA")
                        echo "<option value='CONFIANZA' selected>Confianza</option>"; 
                      else 
                        echo "<option value='CONFIANZA'>Confianza</option>";
                      if ( $empleado->TipoContrato == "EVENTUAL")
                        echo "<option value='EVENTUAL' selected>Eventual</option>"; 
                      else 
                        echo "<option value='EVENTUAL'>Eventual</option>";   
                      if ( $empleado->TipoContrato == "NIVELACION")
                        echo "<option value='NIVELACION' selected>Nivelación</option>"; 
                      else 
                        echo "<option value='NIVELACION'>Nivelación</option>";                 
                  ?>
                  </select>                      
              </div> 
             <div class="form-group col-sm-4">
                  <label for="Estatus">Estatus: (<code style="color:DodgerBlue;"> {{ $empleado->Estatus }} </code>)</label>
                  <br>
               <?php if ( $empleado->Estatus =="ACTIVO")  
                        echo "<input type='radio' name='Estatus' value='ACTIVO' checked> ACTIVO<br>"; 
                     else 
                        echo "<input type='radio' name='Estatus' value='ACTIVO'> ACTIVO<br>";
                     if ($empleado->Estatus == "BAJA") 
                      echo "<input type='radio' name='Estatus' value='BAJA' checked> BAJA<br>"; 
                     else 
                        echo "<input type='radio' name='Estatus' value='BAJA'> BAJA<br>";
              ?>                      
              </div>
            </fieldset>
            <fieldset class="form-group">
              <legend>Informacíon del contrato:</legend>
              <div class="form-group form-inline col-sm-3">
                  <label for="no">No contrato: (<code style="color:DodgerBlue;"> {{ $empleado->no }} </code>)</label>
                  <input type="text" class="form-control" name="no" placeholder="Numero de contrato." value="{{ $empleado->no }}">
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="BIMESTRE">No de bimestre: (<code style="color:DodgerBlue;"> {{ $empleado->BIMESTRE }} </code>)</label>
                  <input type="text" class="form-control" name="BIMESTRE" placeholder="Numero de contrato." value="{{ $empleado->BIMESTRE }}">
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="AniO">Año del contrato: (<code style="color:DodgerBlue;"> {{ $empleado->AniO }} </code>)</label>
                  <input type="text" class="form-control" name="AniO" placeholder="Numero de semestre." value="{{ $empleado->AniO }}">
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="FOLIO" >No de Folio: (<code style="color:DodgerBlue;"> {{ $empleado->FOLIO }} </code>)</label>
                  <input type="text" class="form-control" name="FOLIO" placeholder="Numero de folio." value="{{ $empleado->FOLIO }}">
              </div>
              <div class="form-horizontal form-group  col-sm-10">
                  <label for="PERIODO_CONTRATO">Periodo del contrato: (<code style="color:DodgerBlue;"> {{ $empleado->PERIODO_CONTRATO }} </code>)</label>
                    <input type="text" class="form-control" name="PERIODO_CONTRATO" placeholder="Periodo a contratar." value="{{ $empleado->PERIODO_CONTRATO }}">
              </div>
               <div class="form-horizontal form-group col-sm-10">
                  <label for="FECHA_FIRMA">Fecha de la firma del contrato: (<code style="color:DodgerBlue;"> {{ $empleado->FECHA_FIRMA }} </code>)</label>
                  <input type="text" class="form-control" name="FECHA_FIRMA" placeholder="Fecha de la firma del contrato." value="{{ $empleado->FECHA_FIRMA }}">
              </div>
              <div class="form-horizontal form-group col-sm-10">
                  <label for="PUESTO">Puesto: ()</label>
                  <input type="text" class="form-control" name="PUESTO" placeholder="Puesto a laborar." required>
              </div>
              <div class="form-horizontal form-group col-sm-10">
                  <label for="ADSCRIPCION">Adscripción: ()</label>
                  <input type="text" class="form-control" name="ADSCRIPCION" placeholder="Area de Adscripción." required>
              </div>
            </fieldset>  
            <fieldset class="form-group">
              <legend>Informacíon del oficio de Presentación:</legend>
               <div class="form-group form-inline col-sm-4">
                  <label for="FECHA_PRESENTACION">Fecha de presentación: (<code style="color:DodgerBlue;"> {{ $empleado->FECHA_PRESENTACION }} </code>)</label>
                  <input type="text" class="form-control" name="FECHA_PRESENTACION" placeholder="Fecha de presentación." value="{{ $empleado->FECHA_PRESENTACION }}">
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="NOMBRE_DIR_PRES">Nombre del Director de presentación: (<code style="color:DodgerBlue;"> {{ $empleado->NOMBRE_DIR_PRES }} </code>)</label>
                  <input type="text" class="form-control" name="NOMBRE_DIR_PRES" placeholder="Nombre del Director del Area donde se presentará." value="{{ $empleado->NOMBRE_DIR_PRES }}">
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="PUESTO_DIR_PRES">Puesto del Director de presentación: (<code style="color:DodgerBlue;"> {{ $empleado->PUESTO_DIR_PRES }} </code>)</label>
                  <input type="text" class="form-control" name="PUESTO_DIR_PRES" placeholder="Nombre del puesto del Director del Area donde se presentará." value="{{ $empleado->PUESTO_DIR_PRES }}">
              </div>   
              <div class="form-group form-inline col-sm-4">
                  <label for="NOOFPRES">Numero del oficio de presentación: (<code style="color:DodgerBlue;"> {{ $empleado->NOOFPRES }} </code>)</label>
                  <input type="text" class="form-control" name="NOOFPRES" placeholder="Numero de folio del oficio de presentación." value="{{ $empleado->NOOFPRES }}">
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="FECHAOFICIO">Fecha del oficio de presentación: (<code style="color:DodgerBlue;"> {{ $empleado->FECHAOFICIO }} </code>)</label>
                  <input type="text" class="form-control" name="FECHAOFICIO" placeholder="Fecha del oficio de presentación." value="{{ $empleado->FECHAOFICIO }}">
              </div>              
            </fieldset>
            <fieldset class="form-group">
              <legend>Datos Generales del Personal:</legend>
            <div class="form-group form-inline col-sm-3">
                <label for="NOMBRES">Nombre(s): (<code style="color:DodgerBlue;"> {{ $empleado->NOMBRES }} </code>)</label>
                <input type="text" class="form-control" name="NOMBRES" placeholder="Tu/s nombre/s." value="{{ $empleado->NOMBRES }}">
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">Apellido Paterno: (<code style="color:DodgerBlue;"> {{ $empleado->apaterno }} </code>)</label>
                <input type="text" class="form-control" name="apaterno" placeholder="Tu Apellido paterno." value="{{ $empleado->apaterno }}">
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">Apellido Materno: (<code style="color:DodgerBlue;"> {{ $empleado->amaterno }} </code>)</label>
                <input type="text" class="form-control" name="amaterno" placeholder="Tu Apellido paterno." value="{{ $empleado->amaterno }}">
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">RFC: (<code style="color:DodgerBlue;"> {{ $empleado->RFC }} </code>)</label>
                <input type="text" class="form-control" name="RFC" placeholder="Tu(s) nombres." value="{{ $empleado->RFC }}">
            </div>

            <div  class="form-inline">
              <div class="form-group col-sm-3">
                 <label for="CURP">CURP: (<code style="color:DodgerBlue;"> {{ $empleado->CURP }}</code>)</label>
                 <input type="text" class="form-control" name="CURP" placeholder="Sus clave CURP." value="{{ $empleado->CURP }}">
              </div>
              <div class="form-group col-sm-3">
                 <label for="ESCOLARIDAD">Escolaridad: (<code style="color:DodgerBlue;"> {{ $empleado->ESCOLARIDAD }} </code>)</label>
                 <input type="text" class="form-control" name="ESCOLARIDAD" placeholder="Nombre de tu profesion." value="{{  $empleado->ESCOLARIDAD }}">
              </div>
              <div class="form-group col-sm-3">
                 <label for="ESTUDIOS">Ultimo grado de Estudios: (<code style="color:DodgerBlue;"> {{ $empleado->ESTUDIOS }} </code>)</label>
                 <input type="text" class="form-control" name="ESTUDIOS" placeholder="Ultimo grado de Estudio." value="{{  $empleado->ESTUDIOS }}">
              </div>
              <div class="form-group col-sm-3">
                 <label for="CALLE">Calle: (<code style="color:DodgerBlue;">{{ $empleado->CALLE }} </code>)</label>
                 <input type="text" class="form-control" name="CALLE" placeholder="Nombre de la Calle donde vive." value="{{ $empleado->CALLE }} ">
              </div>           
              <div class="form-group col-sm-3">
                 <label for="NuMERO">Numero: (<code style="color:DodgerBlue;">{{ $empleado->NuMERO }}</code>)</label>
                 <input type="text" class="form-control" name="NuMERO" placeholder="Numero de la Casa y/o no interior." value="{{ $empleado->NuMERO }}">
              </div> 
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
              <div class="form-group col-sm-3">
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
               <label for="TELEFONOMERGENCIA">Tel&eacutefono de Emergencia: (<code style="color:DodgerBlue;"><?php echo $empleado->TELEFONOMERGENCIA; ?></code>)</label>
               <input type="text" class="form-control" name="TELEFONOMERGENCIA" placeholder="Teléfono/s de emergencia al cual llamar en caso de emergencia." value="<?php echo $empleado->TELEFONOMERGENCIA; ?>" required>
            </div>   
            <div class="form-horizontal form-group col-sm-10">
               <label for="nombrepllamar">Nombre de la persona a llamar en caso de emergencia: (<code style="color:DodgerBlue;"><?php echo $empleado->nombrepllamar; ?></code>)</label>
               <div class="form-group col-sm-10">
                   <input class="form-group col-sm-10" type="text" name="nombrepllamar" placeholder="Nombre de la persona a llamar en caso de emergencia" value="<?php echo $empleado->nombrepllamar; ?>" required>
               </div>
            </div>  
            </fieldset>
            <fieldset >
              <legend>Informacíon del Banco:</legend>
              <div class="form-horizontal form-group col-sm-10">
               <label for="CLABE">CLABE (<code style="color:DodgerBlue;"><?php echo $empleado->CLABE; ?></code>)</label>
               <div class="form-group col-sm-10">
                   <input class="form-group col-sm-10" type="text" name="CLABE" placeholder="CLABE de la cuenta" value="<?php echo $empleado->CLABE; ?>" required>
               </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Bitacora de cambios:</legend>
              <div class="form-group col-sm-10">
               <div class="form-group col-sm-10">
                    <textarea name="bitacora" rows="3" cols="80">
                    <?php echo $empleado->bitacora; ?>
                    </textarea> 
               </div>
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