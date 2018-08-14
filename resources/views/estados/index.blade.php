@extends ('Layouts.admin')

@section('content-header')
    <section class="content-header">
      <h1>
        Lista de Estados
        <small>Utilize estos valores para organizar las peticiones.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/peticiones"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Catálogos></li>
        <li class="active">Estados</li>
      </ol>
    </section>
@endsection

@section ('content')

  @include('alerts.success')

	<section class="content">
	    <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3   class="box-title">Lista de Estados</h3>
        </div>
        <div class="box-body">
          <table class="table">
		        <thead>
			       <th>No</th>
			       <th>Descripción</th>
             <th>Imagen</th>
		        </thead>
		      @foreach($estados as $estado)
            <tbody>			       
      				<td>{{$estado->no}}</td>
      				<td>{{$estado->descripcion}}</td>
              @if(empty($estado->imagen))
                <td>
                  {!!Form::open(['route'=>['subirarch',$estado->id],'method'=>'GET'])!!}
                    {!!Form::submit('Subir ', ['class'=>'btn btn-success'])!!}
                    <input type="hidden" name="id" value="{{$estado->id}}"></input>
                  {!!Form::close()!!}   
                </td>
              @else
                <td>
                  {{header("Content-type: image/jpeg")}}
                  <img src="{{'data:image/jpg' . ';base64,' . base64_encode( $estado->imagen)}}" alt="" style="width: 100px; height: 70px;">
                   {!!Form::open(['route'=>['subirarch',$estado->id],'method'=>'GET'])!!}
                     {!!Form::submit('Cambiar Imagen', ['class'=>'btn btn-success'])!!}
                     <input type="hidden" name="id" value="{{$estado->id}}"></input>
                   {!!Form::close()!!} 
                </td>
              @endif
              <!-- Boton Editar -->
      				<td>
                <div style="display: inline-block; padding: 0px; border: hidden; margin: 0px; ">
                  <div style="border: hidden; display: inline-block; border: none; color: white; padding: 0px 0px; text-decoration: none; margin: 4px 2px; cursor: pointer;" >
                    {!!link_to_route('estados.edit', $title = 'Editar', $parameters = $estado->id, $attributes = ['class'=>'btn btn-success'])!!}
                  </div>
                  <!-- Boton Borrar -->
                  <div style="padding-left: 5px; border: hidden; display: inline-block; ">
                   {!!Form::open(['route'=>['estados.destroy',$estado->id],'method'=>'DELETE'])!!}
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
            <div class="list-inline">{{$estados->render()}}</div>
            <div><a href="{{route('estados.create')}}" class="btn btn-primary">Crear</a></div>
        </div>
        <!-- /.box-footer-->
      </div>
	
	</section>
@endsection

