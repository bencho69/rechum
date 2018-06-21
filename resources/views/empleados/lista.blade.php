@extends('layouts.admin')

@section('content')
    <section id="info">
    </section>  
    <section id="blog"> 
  <table style="width: 95%;">
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>RFC</th>
      <th>Puesto</th> 
      <th>Adscripción</th>
      <th>Dirección</th>
      <th>ACCION</th>
    </tr>
 
    @foreach ($empleados as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->NOMBRE_COMPLETO }} </td>
      <td> <a href="{{ route('empleados.edit', $row->id) }}">{{ $row->RFC }}</a>  </td> <td> {{ $row->PUESTO }}</td>
      <td> {{ $row->ADSCRIPCION }} </td> <td> {{ $row->DIRECCION }}</td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('empleados.show', $row->id) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('empleados.edit', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('empleados.oficiop', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('empleados.contrato', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
      </td></tr>
    @endforeach 
    
  </table> 
  
@endsection