@if(Session::has('message'))
 <div class="alert alert-success alert-dismissable">
 	<a href="#" class="close" data-dismiss="alert" aria-label="Cerrar">×</a>
 	{{Session::get('message')}}
 </div>
@endif