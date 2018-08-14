@if(Session::has('message-error'))
 <div class="alert alert-danger  alert-dismissable">
 	<a href="#" class="close" data-dismiss="alert" aria-label="Cerrar">×</a>
 	{{Session::get('message-error')}}
 </div>
@endif