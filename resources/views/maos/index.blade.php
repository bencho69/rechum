@extends('layouts.admin')

@section('content')
<div class="panel-body">

    {!! Form::open(['route' => 'maos.show', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
    <div class="form-group">
      Nombre:
      {!! Form::text('name',$filtro, ['class' => 'form-control','placeholder'=>'Nombre del MAO']) !!}
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
</div>
    @include('alerts.success')
    <section id="info">
    </section>  
    <section id="blog"> 
  <table class="table table-bordered" style="width: 95%;">
    <tr>
      <th>id</th>
      <th>No</th>
      <th>Clave</th>
      <th>Nombre</th> 
      <th>Activo</th>
      <th>Capacidad</th>
      <th>Nombre para contrato</th>
      <th>ACCION</th>
    </tr>
 
    @foreach ($maos as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->no }} </td>
      <td> {{ $row->clave }} </td> <td> {{ $row->nombre }} </td>
      <td> {{ $row->operando }} </td>
      <td> {{ $row->capacidad }} </td>
      <td> {{ $row->nombre_contrato }} </td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('maos.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('maos.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('maos.destroy', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
      </td></tr>
    @endforeach 
    
    {!! $maos->render() !!}
  </table> 
@endsection