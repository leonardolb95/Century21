@extends('layouts.app')

<link href="{{url('/css/index.css')}}" rel="stylesheet" type="text/css" />
@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">

	<div class="row">
		<div class="col-md-12" role = "main" id="contenedor">
			<form class="form-horizontal" action="usuarios.store" method="post">			
				<br>
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">

			
				<div class="panel panel-default"> <div class="panel-heading"><h3 class="panel-title">Clientes</h3></div>
					<div class="panel-body">
						<!--<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputClienteNo" class="col-sm-4 control-label">No. Cliente</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">#</span>
											<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Cliente">
										</div>
									</div>
								</div>
							</div>
							
						</div>-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputNombre" class="col-sm-4 control-label">Nombre</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="inputNombre" name="name" placeholder="Nombre">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputCorreo" class="col-sm-4 control-label">Correo</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="inputCorreo" name="email" placeholder="Correo">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputPassword" class="col-sm-4 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputPassword" class="col-sm-4 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password">
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel-footer">
							<div align="right">
								<button class="btn btn-warning" type="submit">Guardar Registro</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<div class="panel panel-default"> <div class="panel-heading"><h3 class="panel-title">Usuarios Registrados</h3></div>
				<div class="table-responsive">
					<table id="tabUsuarios" class="table table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Modificar</th>
							<th>Eliminar</th>
							<th>Ver</th>
						</tr>
						</thead>
						<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->id}}</td>
								<td>{{$usuario->name}}</td>
								<td>{{$usuario->email}}</td>
								<td><button type="button" class="boton_modificar btn btn-success"  data-toggle="modal" data-target="#modalModificar" value="{{$usuario->id}}">Editar</button></td>
								<td><button  value="{{$usuario->id}}" type="button" class="btn btn-warning btn-circle btn-xl boton_eliminar"><i class="glyphicon glyphicon-remove"></i></button></td>
								<td><button  value="{{$usuario->id}}" type="button" class="btn btn-default btn-PDF">PDF</button></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<form action="usuarios.editar" method="post">
	<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  	       aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Usuario</h4>
        </div>
            <div class="modal-body">
            

            	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">
            	
        
						<!--<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputClienteNo" class="col-sm-4 control-label">No. Cliente</label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">#</span>
											<input type="text" class="form-control" id="inputId" aria-label="Amount (to the nearest dollar)" placeholder="Cliente">
										</div>
									</div>
								</div>
							</div>
						</div>-->
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputNombre" class="col-sm-4 control-label">Nombre</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="inputNombre" name="name" placeholder="Nombre">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputCorreo" class="col-sm-4 control-label">Correo</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="inputCorreo" name="email" placeholder="Correo">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputPassword" class="col-sm-4 control-label">Nuevo Password</label>
									<div class="col-sm-8">
										<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
									</div>
								</div>
							</div>
						</div>
            			<br>
            			<input type="hidden" name="id" id="id">
            
            
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		            <button type="submit" id="modalGuardar" class="btn btn-primary">Guardar</button>
		          </div>
		          </div>
		          </div>
        	</div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

</form>

            	 	


	<script type="text/javascript">
        $('#catalogos').attr('class', 'active');
        $('#usuarios').attr('class', 'active');
	</script>







    <script src="{{ asset('/js/usuarios.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.2.0.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!--
	

    <script src="{{ asset('/js/clientes.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

 -->
@endsection
