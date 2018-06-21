@extends('layouts.admin')

@section('content')
       <div class="container">
          
          <h4>Agrega los datos del empleado los capos obligatorios tienen un *.</h4>
          
          {!! Form::open(['url' => 'usuarios/store', 'method' => 'put']) !!}
            <fieldset class="form-group">
              <div class="form-horizontal form-group col-sm-3">
                  <label for="TipoContrato">Tipo de contrato: ()*</label>
                  <select name="TipoContrato" class="form-control" required>
                     <option value='CONFIANZA'>Confianza</option>
                      <option value='EVENTUAL'>Eventual</option>
                      <option value='NIVELACION'>Nivelación</option>             
                  </select>                      
              </div> 
             <div class="form-group col-sm-4">
                  <label for="Estatus">Estatus: ()*</label>
                  <br>
                    <input type='radio' name='Estatus' value='ACTIVO' required> ACTIVO<br>
                    <input type='radio' name='Estatus' value='BAJA'> BAJA<br>                     
              </div>
            </fieldset>
            <fieldset class="form-group">
              <legend>Informacíon del contrato:</legend>
              <div class="form-group form-inline col-sm-3">
                  <label for="no">No contrato: ()</label>
                  <input type="text" class="form-control" name="no" placeholder="Numero de contrato." value="{{$noEmp}}">
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="BIMESTRE">No de bimestre: ()</label><br>
                  <input type='radio' name='BIMESTRE' value='S1' required> Primer Semestre<br>
                  <input type='radio' name='BIMESTRE' value='S2'> Segundo Semestre<br>
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="AniO">Año del contrato: ()</label>
                  <input type="text" class="form-control" name="AniO" placeholder="Numero de semestre." >
              </div>
              <div class="form-group form-inline col-sm-3">
                  <label for="FOLIO" >No de Folio: ()</label>
                  <input type="text" class="form-control" name="FOLIO" placeholder="Numero de folio." >
              </div>
              <div class="form-horizontal form-group  col-sm-10">
                  <label for="PERIODO_CONTRATO">Periodo del contrato: ()</label>
                    <input type="text" class="form-control" name="PERIODO_CONTRATO" placeholder="Escriba el Periodo a contratar. ej. 1 de enero de 2019 al 30 de junio de 2019" required>
              </div>
               <div class="form-horizontal form-group col-sm-10">
                  <label for="FECHA_FIRMA">Fecha de la firma del contrato: ()</label>
                  <input type="text" class="form-control" name="FECHA_FIRMA" placeholder="Fecha de la firma del contrato." required>
              </div>
              <div class="form-horizontal form-group col-sm-10">
                  <label for="PUESTO">Puesto: ()</label>
                  <input type="text" class="form-control" name="PUESTO" placeholder="Puesto a laborar." required>
                  <select name="PUESTO" class="form-control" required>
                  @foreach ( $puestos as $puesto)
                     <option value='{{$puesto->puesto}}'>{{$puesto->puesto}}</option>  
                  @endforeach
                  </select>  
              </div>
              <div class="form-horizontal form-group col-sm-10">
                  <label for="ADSCRIPCION">Adscripción: ()</label>
                  <input type="text" class="form-control" name="ADSCRIPCION" placeholder="Area de Adscripción." required>
              </div>
            </fieldset>  
            <fieldset class="form-group">
              <legend>Informacíon del oficio de Presentación:</legend>
               <div class="form-group form-inline col-sm-4">
                  <label for="FECHA_PRESENTACION">Fecha de presentación: ()</label>
                  <input type="text" class="form-control" name="FECHA_PRESENTACION" placeholder="Fecha de presentación." >
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="NOMBRE_DIR_PRES">Nombre del Director de presentación: ()</label>
                  <input type="text" class="form-control" name="NOMBRE_DIR_PRES" placeholder="Nombre del Director del Area donde se presentará." >
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="PUESTO_DIR_PRES">Puesto del Director de presentación: ()</label>
                  <input type="text" class="form-control" name="PUESTO_DIR_PRES" placeholder="Nombre del puesto del Director del Area donde se presentará." >
              </div>   
              <div class="form-group form-inline col-sm-4">
                  <label for="NOOFPRES">Numero del oficio de presentación: ()</label>
                  <input type="text" class="form-control" name="NOOFPRES" placeholder="Numero de folio del oficio de presentación." >
              </div> 
              <div class="form-group form-inline col-sm-4">
                  <label for="FECHAOFICIO">Fecha del oficio de presentación: ()</label>
                  <input type="text" class="form-control" name="FECHAOFICIO" placeholder="Fecha del oficio de presentación.">
              </div>              
            </fieldset>
            <fieldset class="form-group">
              <legend>Datos Generales del Personal:</legend>
            <div class="form-group form-inline col-sm-3">
                <label for="NOMBRES">Nombre(s): ()</label>
                <input type="text" class="form-control" name="NOMBRES" placeholder="Tu/s nombre/s." required>
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">Apellido Paterno: (</label>
                <input type="text" class="form-control" name="apaterno" placeholder="Tu Apellido paterno." required>
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">Apellido Materno: ()</label>
                <input type="text" class="form-control" name="amaterno" placeholder="Tu Apellido paterno." required="">
            </div>
            <div class="form-group form-inline col-sm-3">
                <label for="nombre">RFC: ()</label>
                <input type="text" class="form-control" name="RFC" placeholder="Tu(s) nombres." required="">
            </div>

            <div  class="form-inline">
              <div class="form-group col-sm-3">
                 <label for="CURP">CURP: ()</label>
                 <input type="text" class="form-control" name="CURP" placeholder="Sus clave CURP." >
              </div>
              <div class="form-group col-sm-3">
                 <label for="ESCOLARIDAD">Escolaridad: ()</label>
                 <input type="text" class="form-control" name="ESCOLARIDAD" placeholder="Nombre de tu profesion." required="">
              </div>
              <div class="form-group col-sm-3">
                 <label for="ESTUDIOS">Ultimo grado de Estudios: ()</label>
                 <select name="ESTUDIOS" class="form-control">
                    <option value='PRIMARIA'>Primaria</option>
                    <option value='SECUNDARIA'>Secundaria</option>
                    <option value='PREPARATORIA'>Preparatoria</option>  
                    <option value='LICENCIATURA'>Licenciatura</option>
                    <option value='MAESTRIA'>Maestria</option>
                    <option value='DOCTORADO'>Doctorado</option> 
                    <option value='SIN DATOS'>Sin Datos</option> 
                 </select>  
              </div>
              <div class="form-group col-sm-3">
                 <label for="CALLE">Calle: ()</label>
                 <input type="text" class="form-control" name="CALLE" placeholder="Nombre de la Calle donde vive." >
              </div>           
              <div class="form-group col-sm-3">
                 <label for="NuMERO">Numero: ()</label>
                 <input type="text" class="form-control" name="NuMERO" placeholder="Numero de la Casa y/o no interior." >
              </div> 
              <div class="form-group col-sm-3">
                 <label for="COLONIA">Colonia: ()</label>
                 <input type="text" class="form-control" name="COLONIA" placeholder="Nombre de la Colonia o barrio." >
              </div>             
              <div class="form-group col-sm-3">
                 <label for="copigop">C&oacutedigo Postal: ()</label>
                 <input type="text" class="form-control" name="copigop" placeholder="Codigo postal" >
              </div>             
              <div class="form-group col-sm-3">
                 <label for="CIUDAD">Ciudad: ()</label>
                 <input type="text" class="form-control" name="CIUDAD" placeholder="Nombre de la Ciudad" >
              </div>  
              <div class="form-group col-sm-3">
                 <label for="ENTFED">Entidad Federativa: ()</label>
                 <input type="text" class="form-control" name="ENTFED" placeholder="Nombre de la entidad federativa." 
              </div>       
            </div>   
            <div  class="form-inline">   
            <fieldset class="form-group">
              <legend>Informacíon Personal:</legend>
              
            <div class="form-group col-sm-3">
               <label for="EDOCIVIL">Estado Civil: () </label> <br>
                
                      <input type='radio' name='EDOCIVIL' value='CASADO' required> CASADO<br>
                     <input type='radio' name='EDOCIVIL' value='SOLTERO'> SOLTERO<br>
                     <input type='radio' name='EDOCIVIL' value='DIVORCIADO'> DIVORCIADO<br>
                     <input type='radio' name='EDOCIVIL' value='SIN DATOS'> SIN DATOS<br>                   
            </div> 
            <div class="form-group col-sm-3">
               <label for="SEXOFM">SEXO: ()</label> <br>
               <input type='radio' name='SEXOFM' value='MASCULINO' required> MASCULINO<br>
               <input type='radio' name='SEXOFM' value='FEMENINO'> FEMENINO<br>
               <input type='radio' name='SEXOFM' value='SIN DATOS'> SIN DATOS<br>              

            </div>
              <div class="form-group col-sm-4" style="">

              </div>
            <div class="form-group col-sm-3">
               <label for="NOHIJOS">Numero de hijos: ()</label>
               <input type="text" class="form-control" name="NOHIJOS" placeholder="Cantidad de hijos que tiene." >

               <label for="FACTORRH">Tipo de sangre y factor rh: ()</label>
               <input type="text" class="form-control" name="FACTORRH" placeholder="Tipo de sangre ej. O+" >
            </div>
            <div class="form-group col-sm-6">
               <label for="CORREOE">Correo Electr&oacutenico: ()</label>
               <input type="text" class="form-control" name="CORREOE" placeholder="Correo elecrtónico ej. cuenta@servidor.com.mx"  style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();">
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOCONT" >Tel&eacutefono de contacto de Casa con lada: ()</label>
               <input type="text" class="form-control" name="TELEFONOCONT" placeholder="Teléfono de casa al cual comunicarse." >
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOCEL">Tel&eacutefono Celular: ()</label>
               <input type="text" class="form-control" name="TELEFONOCEL" placeholder="Su teléfono personal o celular" >
            </div>
            <div class="form-group col-sm-6">
               <label for="TELEFONOMERGENCIA">Tel&eacutefono de Emergencia: ()</label>
               <input type="text" class="form-control" name="TELEFONOMERGENCIA" placeholder="Teléfono/s de emergencia al cual llamar en caso de emergencia." >
            </div>   
            <div class="form-horizontal form-group col-sm-10">
               <label for="nombrepllamar">Nombre de la persona a llamar en caso de emergencia: ()</label>
               <div class="form-group col-sm-10">
                   <input class="form-group col-sm-10" type="text" name="nombrepllamar" placeholder="Nombre de la persona a llamar en caso de emergencia" >
               </div>
            </div>  
            </fieldset>
            <fieldset >
              <legend>Informacíon del Banco:</legend>
              <div class="form-horizontal form-group col-sm-10">
               <label for="CLABE">CLABE ()</label>
               <div class="form-group col-sm-10">
                   <input class="form-group col-sm-10" type="text" name="CLABE" placeholder="CLABE de la cuenta"  required>
               </div>
              </div>
            </fieldset>
          </div>         
            <input class="btn btn-primary" type="submit" value="Guardar">
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