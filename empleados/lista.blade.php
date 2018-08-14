@extends('layouts.admin')

@section('css')
   <link rel="stylesheet" type="text/css" href="/admin/css/datatables.min.css"/>
@endsection

@section('content')
<div class="panel-body">

    {!! Form::open(['route' => 'empleados.lista', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
    <div class="form-group">
      Nombre:
      {!! Form::text('name',$filtro, ['class' => 'form-control','placeholder'=>'Nombre del usuario']) !!}
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
    {!! $empleados->render() !!}
</div>
    <section id="info">
    </section>  
    <section id="blog"> 
  <table style="width: 95%;" id="DataTable">
    <thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>RFC</th>
      <th>Puesto</th> 
      <th>Adscripción</th>
      <th>Dirección</th>
      <th>ACCION</th>
    </tr>
    </thead> 
    <tbody>
    @foreach ($empleados as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->NOMBRE_COMPLETO }} </td>
      <td> <a href="{{ route('empleados.edit', [$row->id, $filtro]) }}">{{ $row->RFC }}</a>  </td> <td> {{ $row->PUESTO }}</td>
      <td> {{ $row->ADSCRIPCION }} </td> <td> {{ $row->DIRECCION }}</td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('empleados.show', $row->id) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('empleados.edit', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('empleados.oficiop', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('empleados.contrato', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
      </td></tr>
    @endforeach 
    </tbody>
    <tfoot>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>RFC</th>
        <th>Puesto</th> 
        <th>Adscripción</th>
        <th>Dirección</th>
        <th>ACCION</th>
      </tr>      
    </tfoot>
    
  </table> 
  {!! $empleados->render() !!}
@endsection

@section('js')
    <!-- 
    Traducción al español de:
     https://www.datatables.net/plug-ins/i18n/Spanish -->
    <script type="text/javascript" src="/admin/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#DataTable').dataTable({
              "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No encontré nada - Lo siento",
                  "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                  "infoEmpty": "No hay registros disponibles",
                  "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                  },
                  "sProcessing":     "Procesando...",
                  "sSearch":         "Buscar:",
                  "infoFiltered": "(Filtrado de _MAX_ registros totales)"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            });
        });
    </script>
@endsection
