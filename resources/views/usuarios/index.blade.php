@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Area de Administración</div>

                <div class="panel-body">
                    Estas dentro. !Bienvenido!
                </div>
            </div>
        </div>
        @if(Auth::user()->tipo == "ADMIN")
        <div class="col-md-4 col-md-offset-1">      
            <div class="box">
               <div class="box-body">
                <style>
                  table {border-collapse: collapse;width: 100%;}th, td {text-align: left;padding: 8px;}tr:nth-child(even){background-color: #f2f2f2}
                </style>
                 <table>
                     <tr> <th>Estadistico       </th>               <th>Valor                   </th>  </tr>
                     <tr>  <td>Número de sismos registrados:</td>   <td>{{$NoSismos}} </td>  </tr>
                     <tr>  <td>Administradores: </td>               <td>{{$NoAdmin}}   </td>  </tr>
                     <tr>  <td>Usuario:         </td>               <td>{{$NoUsr}}       </td>  </tr>
                     <tr>  <td>Teléfonos:       </td>               <td>                        </td>  </tr>
                     <tr>  <td>Encuestas:       </td>               <td>{{$NoEnc}}       </td>  </tr>
                     <tr>  <td> - Perfectas     </td>               <td>{{$NoEncP}}     </td>  </tr>
                     <tr>  <td> - Imperfectas   </td>               <td>{{$NoEncI}}     </td>  </tr>
                 </table>
               </div>
            </div>
            <div class="box col-md-4">
               <div class="box-body">
                  <p>Del ultimo sismo: {{$fechaUs}}</p>
                  <table>
                     <tr> <th>Intensidad </th>               <th>No encuestas  </th>  </tr>
                     <?php $Cant = 0; ?>
                     @foreach ($DatG as $row)
                        <?php $Cant = $Cant + $row->cant; ?> 
                       <tr>  <td>{{$row->intensidad}}</td>   <td>{{$row->cant}} </td>  </tr>
                     @endforeach
                 </table>
                 <p>Total de encuestas : <?php echo $Cant; ?> </p>
               </div> 
            </div>    
        </div>
        @endif
    </div>
</div>
@endsection

