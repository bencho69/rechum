@extends('layouts.admin')

@section('content')

       <div class="container">
          <h3><p>Este es el catálogo autorizado de tarifas para comisiones del personal. 
            </p> <br>                     
          </h3>
          <h4>Realiza los cambios que consideres.</h4>
  
          {!! Form::model($tarifa, ['route' => ['tarifas.update', $tarifa->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}  
            
            <div class="form-group col-sm-6">
                <label for="no">Concepto: (<code style="color:DodgerBlue;"> {{ $tarifa->concepto }} </code>)</label><br>
                 <?php if ( $tarifa->concepto =="VIATICOS")  
                        echo "<input type='radio' name='concepto' value='VIATICOS' checked> VIATICOS<br>"; 
                     else 
                        echo "<input type='radio' name='concepto' value='VIATICOS'> VIATICOS<br>";
                     if ($tarifa->concepto == "GCAMINO") echo "<input type='radio' name='concepto' value='GCAMINO' checked> Gastos de camino<br>"; 
                     else echo "<input type='radio' name='concepto' value='GCAMINO'> Gastos de camino<br>";
                     if ($tarifa->concepto == "TODOS") echo "<input type='radio' name='concepto' value='TODOS' checked> TODOS<br>" ;
                     else echo "<input type='radio' name='concepto' value='TODOS'> TODOS<br>";
                 ?>
            </div>
           
              <div class="form-group col-sm-6">
                 <label for="clave">Grupo Jerarquico: (<code style="color:DodgerBlue;"> {{ $tarifa->grupoj }}</code>)</label>
                 <input type="text" class="form-control" name="grupoj" placeholder="Grupo Jerarquico." value="{{ $tarifa->grupoj }}">
              </div>
              <div class="form-group col-sm-6">
                 <label for="nombre">Tarifa: (<code style="color:DodgerBlue;"> {{ $tarifa->tarifa }} </code>)</label>
                 <input type="text" class="form-control" name="tarifa" placeholder="Monto de la Tarifa" value="{{  $tarifa->tarifa }}">
              </div>
              <div class="form-group col-sm-6">
               <label for="operando">Tiene Tarifa al 50%: (<code style="color:DodgerBlue;">{{ $tarifa->tarifa50 }}</code>)? </label> <br>
               <?php if ( $tarifa->tarifa50=="SI")  
                        echo "<input type='radio' name='tarifa50 value='SI' checked> SI<br>"; 
                     else 
                        echo "<input type='radio' name='tarifa50 value='SI'> SI<br>";
                     if ($tarifa->tarifa50 == "NO") echo "<input type='radio' name='tarifa50 value='NO' checked> NO<br>"; 
                     else echo "<input type='radio' name='tarifa50 value='NO'> NO<br>";
              ?> 
              </div>
              <div class="form-group col-sm-6">
               <label for="tipom">Tipo de Cambio: (<code style="color:DodgerBlue;">{{ $tarifa->moneda }}</code>) </label> <br>
               <?php if ( $tarifa->moneda =="PESOS")  
                        echo "<input type='radio' name='moneda' value='PESOS' checked> PESOS<br>"; 
                     else 
                        echo "<input type='radio' name='moneda' value='PESOS'> PESOS<br>";
                     if ($tarifa->moneda == "EURO/DOLAR") echo "<input type='radio' name='moneda' value='EURO/DOLAR' checked> EURO/DOLAR<br>"; 
                     else echo "<input type='radio' name='moneda' value='EURO/DOLAR'> EURO/DOLAR <br>";
              
              ?>                      
              </div> 
              
              
            <div class="form-group col-sm-6">
               <label for="turno">Tipo de comision: (<code style="color:DodgerBlue;"><?php echo $tarifa->tipocom; ?></code>)</label> <br>
               <?php if ($tarifa->tipocom == "ESTATAL")  
                        echo "<input type='radio' name='tipocom' value='ESTATAL' checked> ESTATAL<br>"; 
                     else 
                        echo "<input type='radio' name='tipocom' value='ESTATAL'> ESTATAL<br>";
                     if ($tarifa->tipocom == "NACIONAL") echo "<input type='radio' name='tipocom' value='NACIONAL' checked> NACIONAL<br>"; 
                     else echo "<input type='radio' name='tipocom' value='NACIONAL'> NACIONAL<br>";
                     if ($tarifa->tipocom == "INTERNACIONAL") echo "<input type='radio' name='tipocom' value='INTERNACIONAL' checked> INTERNACIONAL<br>" ;
                     else echo "<input type='radio' name='tipocom' value='INTERNACIONAL'> INTERNACIONAL<br>";
                 
              ?> 
            </div>  
            <div class="form-group col-sm-6">
               <label for="turno">Tipo de mando: (<code style="color:DodgerBlue;"><?php echo $tarifa->mando; ?></code>)</label> <br>
               <?php if ($tarifa->mando == "OPERATIVO")  
                        echo "<input type='radio' name='mando' value='OPERATIVO' checked> OPERATIVO<br>"; 
                     else 
                        echo "<input type='radio' name='mando' value='OPERATIVO'> OPERATIVO<br>";
                     if ($tarifa->mando == "MEDIO") echo "<input type='radio' name='mando' value='MEDIO' checked> MEDIO<br>"; 
                     else echo "<input type='radio' name='mando' value='NACIONAL'> NACIONAL<br>";
                     if ($tarifa->mando == "SUPERIOR") echo "<input type='radio' name='mando' value='SUPERIOR' checked> SUPERIOR<br>" ;
                     else echo "<input type='radio' name='mando' value='SUPERIOR'> SUPERIOR<br>";
                 
              ?> 
            </div>  
            <fieldset class="form-group form-group col-sm-12">  
              <div class="form-horizontal form-group col-sm-12">
              <legend>Informacíon Adicional :</legend>
                <div class="form-group col-sm-12">
                     <label for="ciudad">Observaciones del destino: (<code style="color:DodgerBlue;"> Indique las Observaciones de ésta tarifa. </code>)</label>
                     
                     <textarea class="form-control" rows="5" id="ciudad" name="ciudad">{{  $tarifa->ciudad }}</textarea>
                </div> 
              </div>
              <input class="btn btn-primary" type="submit" value="Actualizar y Guardar">             
            </fieldset>
          </form>  

          <?php 
            echo "<a href='/logout' class='btn btn-success' id='bsalir' style='display:none'>Salir sin Guardar..</a>";
          ?>   
       </div>
 
 @endsection