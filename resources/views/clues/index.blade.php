@extends('layouts.admin')

@section('content')
<div class="panel-body col-sm-6">
    {!! Form::open(['route' => 'clues.show', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
    <div class="form-group">
      Nombre:
      {!! Form::text('name',$filtro, ['class' => 'form-control','placeholder'=>'Nombre del MAO']) !!}
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
</div>
<div class="panel-body col-sm-6">
    {!! Form::open(['route' => 'clues.show', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
    <div class="form-group">
      Localidad:
      {!! Form::text('localidad',$filtroL, ['class' => 'form-control','placeholder'=>'Nombre del MAO']) !!}
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
      <th>CLUES</th>
      <th>Nombre Unidad</th>
      <th>Localidad</th> 
      <th>km</th>
      <th>Municipio</th>
      <th>ACCION</th>
    </tr>
 
    @foreach ($clues as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->CLUES }} </td>
      <td> {{ $row->nombreu }} </td> <td> {{ $row->localidad }} </td>
      <td> {{ $row->km }} </td>
      <td> {{ $row->municipio }} </td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('clues.edit', ['id'=>$row->id,'filtro'=>$filtro, 'filtroL'=>$filtroL]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <a href="{{ route('clues.edit', ['id'=>$row->id,'filtro'=>$filtro, 'filtroL'=>$filtroL]) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
        <a href="{{ route('clues.destroy', $row->id) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
      </td></tr>
    @endforeach 
    
    {!! $clues->render() !!}
  </table> 
@endsection