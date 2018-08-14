@extends('layouts.admin')

@section('content')
<div class="panel-body">

    {!! Form::open(['route' => 'tarifas.show', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
    <div class="form-group">
      Nombre:
      {!! Form::text('name',$filtro, ['class' => 'form-control','placeholder'=>'Nombre de la ciudad']) !!}
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
      <th>Concepto</th>
      <th>Grupo Jerarquico</th>
      <th>Tarifa</th> 
      <th>Observaciones</th>
      <th>ACCION</th>
    </tr>
 
    @foreach ($tarifa as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->concepto }} </td>
      <td> {{ $row->grupoj }} </td> <td> {{ $row->tarifa }} </td>
      <td> {{ $row->ciudad }} </td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('tarifas.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('tarifas.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('tarifas.destroy', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
      </td></tr>
    @endforeach 
    
    {!! $tarifa->render() !!}
  </table> 
@endsection