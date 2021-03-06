@extends('layouts.app')
<link href="{{url('/css/index.css')}}" rel="stylesheet" type="text/css" />
@section('container')
    <div class="row">
        <div class="col-md-12" role = "main" id="contenedor">
            <form class="form-horizontal" action="enganches.store" method="post">
                <br>
                <div class="panel panel-default"> <div class="panel-heading"><h3 class="panel-title">Pago de Solicitud</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-4 control-label">Solicitud</label>
                                    <div class="col-sm-4">
                                        <select name="solicitud_id" class="form-control" id="input-solicitud">
                                            <option value="0" selected>Ninguno</option>
                                            @foreach($solicitudes as $solicitud)
                                                <option value="{{$solicitud->id}}">{{$solicitud->id}}  -  {{$solicitud->nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-4 control-label">Nombre</label>
                                    <div class="col-sm-8">
                                        <select name="nombre" class="form-control" id="input-nombre">
	                                        <option value="0" selected>Ninguno</option>
	                                        @foreach($solicitudes as $solicitud)
	                                            <option value="{{$solicitud->id}}">{{$solicitud->nombre}}</option>
	                                        @endforeach
                                    	</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-" class="col-sm-4 control-label">Fraccionamiento</label>
                                    <div class="col-sm-8">
                                        <select name="fraccionamiento" class="form-control" id="input-fraccionamiento">
	                                        <option value="0" selected>Ninguno</option>
	                                        @foreach($solicitudes as $solicitud)
	                                            <option value="{{$solicitud->id}}">{{$solicitud->fraccionamiento}}</option>
	                                        @endforeach
                                    	</select> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lote" class="col-sm-4 control-label">Lote</label>
                                    <div class="col-sm-8">
                                        <select name="lote" class="form-control" id="input-lote">
		                                        <option value="0" selected>Ninguno</option>
		                                        @foreach($solicitudes as $solicitud)
		                                            <option value="{{$solicitud->id}}">{{$solicitud->lote}}</option>
		                                        @endforeach
                                    	</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="manzana" class="col-sm-4 control-label">Manzana</label>
                                    <div class="col-sm-8">
                                        <select name="manzana" class="form-control" id="input-manzana">
		                                        <option value="0" selected>Ninguno</option>
		                                        @foreach($solicitudes as $solicitud)
		                                            <option value="{{$solicitud->id}}">{{$solicitud->manzana}}</option>
		                                        @endforeach
                                    	</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input-superficie" class="col-sm-5 control-label">Saldo Enganche</label>
                                    <div class="col-sm-7">
                                        <select name="enganche" class="form-control" id="input-enganche">
		                                        <option value="0" selected>Ninguno</option>
		                                        @foreach($solicitudes as $solicitud)
		                                            <option value="{{$solicitud->id}}">{{$solicitud->enganche}}</option>
		                                        @endforeach
                                    	</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-4 control-label">Fecha</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="input-fecha-recibo" name="fecha">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-3 control-label">Concepto</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="input-concepto" name="concepto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-4 control-label">Monto</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="input-monto" name="monto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="panel-footer">
                            <div align="right">
                                <button class="btn btn-warning">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="panel panel-default"> <div class="panel-heading"><h3 class="panel-title">Pagos Registrados</h3></div>
                <div class="table-responsive">
                    <table id="tabSolicitudes" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Cliente</th>
                            <th>Concepto</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                        </tr>   
                        </thead>
                        <tbody>
                        	@foreach($recibos as $recibo)
                        		<tr>
                        			<td>{{$recibo->recibo_id}}</td>
                        			<td>{{$recibo->nombre}}</td>
                        			<td>{{$recibo->concepto}}</td>
                        			<td>{{$recibo->fecha}}</td>
                        			<td>{{$recibo->monto}}</td>
                                    <td><button type="button" class="boton_modificar btn btn-success"  data-toggle="modal" data-target="#modalModificar" value="{{$recibo->recibo_id}}">Editar</button></td>
                                    <td><button  value="{{$recibo->recibo_id}}" type="button" class="btn btn-warning btn-circle btn-xl boton_eliminar"><i class="glyphicon glyphicon-remove"></i></button></td>
                        		</tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="enganches.editar" method="post">
        <div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Pago de Solicitud</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-2 control-label">Fecha</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="input-fecha-recibo" name="fecha">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">    
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-2 control-label">Concepto</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-concepto" name="concepto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="input-nombre" class="col-sm-2 control-label">Monto</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="input-monto" name="monto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <br>
                        <br>
                        <div class="panel-footer">
                            <div align="right">
                                <button class="btn btn-warning">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
    <script type="text/javascript">
        $('#movimientos').attr('class', 'active');
        $('#pago_solicitudes').attr('class', 'active');
    </script>
    <script src="{{ asset('/js/enganches.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.2.0.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
@endsection
