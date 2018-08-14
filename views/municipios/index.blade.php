@extends ('Layouts.admin')

@section('content-header')
  <section class="content-header">
      <h1>
        Lista de Municipio
        <small>Utilize estos municipios para organizar el origen o destino de las comisiones.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Catálogos></li>
        <li class="active">Municipios</li>
      </ol>
  </section>
@endsection

@section ('content')

  @include('alerts.success')

	<section class="content">
	    <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3   class="box-title">Lista de Municipios</h3>
        </div>
        <div class="box-body">
          <table class="table">
		        <thead>
			       <th>No</th>
			       <th>Descripcion</th>
			       <th>Color</th>
             <th>imagen</th>
             <th>Opciones</th>
		        </thead>
              
		      @foreach($mpos as $mpo)
        <tbody>
				<td>{{$mpo->no}}</td>
				<td>{{$mpo->descripcion}}</td>
        <td >
          <div style="width: 60px; text-align: center;overflow: hidden; padding: 15px 0px;background-color: {{$mpo->color}}; ">{{$mpo->color}}</div>
        </td>

          @if(empty($mpo->imagen))
                <td>
                  {!!Form::open(['route'=>['subirmpo',$mpo->id],'method'=>'GET'])!!}
                    {!!Form::submit('Subir ', ['class'=>'btn btn-success'])!!}
                    <input type="hidden" name="id" value="{{$mpo->id}}"></input>
                  {!!Form::close()!!}   
                </td>
              @else
                <td>
                  {{header("Content-type: image/jpeg")}}
                  <img src="{{'data:image/jpg' . ';base64,' . base64_encode( $mpo->imagen)}}" alt="" style="width: 100px; height: 70px;">
                   {!!Form::open(['route'=>['subirmpo',$mpo->id],'method'=>'GET'])!!}
                     {!!Form::submit('Cambiar Imagen', ['class'=>'btn btn-success'])!!}
                     <input type="hidden" name="id" value="{{$mpo->id}}"></input>
                   {!!Form::close()!!} 
                </td>
              @endif
     

        <!-- Boton Editar -->
				<td>
          <div style="display: inline-block; padding: 0px; border: hidden; margin: 0px; ">
            <div style="border: hidden; display: inline-block; border: none;
      color: white; padding: 0px 0px; text-decoration: none; margin: 4px 2px;
      cursor: pointer;" >
            {!!link_to_route('municipios.edit', $title = 'Editar', $parameters = $mpo->id, $attributes = ['class'=>'btn btn-success'])!!}
            </div>
          <!-- Boton Borrar -->
            <div style="padding-left: 5px; border: hidden; display: inline-block; ">
            {!!Form::open(['route'=>['municipios.destroy',$mpo->id],'method'=>'DELETE'])!!}
               {!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
             {!!Form::close()!!}  
             </div>
           </div>
        </td>
      </tbody>  
		@endforeach
    
	</table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div style="border: hidden; display: inline-block; border: none; color: white; padding: 0px 0px; text-decoration: none;
    margin: 4px 2px; cursor: pointer; class='btn btn-primary'" >{{$mpos->render()}}</div>
            <div><a href="{{route('municipios.create')}}" class="btn btn-primary">Crear</a></div>
        </div>
        <!-- /.box-footer-->
      </div>
	
	</section>
@endsection

