@extends('layouts.admin')

@section('content-header')
  <section class="content-header">
      <h1>
        Lista de Comisiones
        <small>Lista de solicitudes de comisiones en transito.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">comisiones></li>
        <li class="active">Acuerdos</li>
      </ol>
  </section>
@endsection

@section('content')
    <div class="panel-body">

        {!! Form::open(['route' => 'comision.show', 'method' => 'GET', 'class'=> 'navbar-form navbar-left']) !!}
        <div class="form-group">
          Objetivo:
          {!! Form::text('objetivo',$filtro, ['class' => 'form-control','placeholder'=>'Buscar por objetivo']) !!}
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}
    </div>
    @include('alerts.success')
 
    <section id="blog"> 
  <div class="table-responsive">  
  <table class="table table-bordered" style="width: 95%;">
    <thead >
    <tr role="row">
      <th class="sorting" aria-control="example2" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">id
      </th>
      <th>Fecha</th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Objetivo</th>
      <th width="150px" align="center">ACCION</th>
      <th>Autorizada</th>
      <th>Observaciones</th>
    </tr>
    </thead>
    {!! $coms->render() !!}
    @foreach ($coms as $row)
      <tr>
      <td> {{ $row->id }} </td> <td> {{ $row->fechaof }} </td>
      <td> {{ $row->origen }} </td> <td> {{ $row->destino }} </td>
      <td> {{ $row->objetivo }} </td>
      <td  class='col-sm-1' style='display: inline; width: 150px; margin: auto; '>
        <a href="{{ route('comision.edit', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
        <!-- <a href="{{ route('comision.destroy', [$row->id, 'method'=>'delete', '_token'=>csrf_field()]) }}" class="btn btn-link"><span class="oi oi-trash"></span></a>  -->
        <form action="{{ url('/comision', ['id' => $row->id]) }}" method="post" style="display: inline;" >
            {!! method_field('delete') !!}
            {!! csrf_field() !!}
            <button class="oi oi-trash" type="submit"></button>
        </form>
        <a href="{{ route('comision.acuerdo', ['id'=>$row->id,'filtro'=>$filtro]) }}" class="btn btn-link" style="display: inline;"><span class="oi oi-text"></span></a>
      </td>
       <td align="center">{{ $row->autorizada }}</td>
       <td>{{ $row->observaciones }}</td>
    </tr>
    @endforeach 
    
    {!! $coms->render() !!}
  </table> 
</div>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  
  <div class="box-footer">
            {!! $coms->render() !!}
            <div><a href="{{route('comision.create')}}" class="btn btn-primary">Crear Comision</a></div>
        </div>
  </section >

@endsection