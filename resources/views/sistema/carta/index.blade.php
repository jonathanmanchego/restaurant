@extends('layout.sistema')


@section('content')
	<div class="container-crud">
		@if (session('confirmacion'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<ul>
					<li>{{ session('confirmacion') }}</li>
				</ul>
			</div>
		@endif
		
		<div class="opciones">
			<a class="btn btn-primary btn-block" href="{{ url('/sistema'.$action.'/create') }}" role="button">
				<i class="fas fa-plus"></i><span>NUEVO</span>
			</a>
			{{-- <a class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#modal-default1" ><span class="fa fa-list"></span>  INSTANCIAR</a> --}}
		</div>
		@if (!empty($data[0]))
		<div class="listado">
			<div class="listado-headers">
				@foreach ($headers as $header)
					<div class="listado-header-item">
						<span>{{strtoupper($header)}}</span>
					</div>
				@endforeach
				<div class="listado-header-item">
					<span>VER/EDITAR</span>
				</div>
				<div class="listado-header-item">
					<span>ACTIVAR</span>
				</div>
			</div>
			@foreach ($data as $key => $ele)
				<div class="listado-item" >
					<div class="listado-item-ele">
						<span>{{$ele->id}}</span>
					</div>
					<div class="listado-item-ele">
						<span>{{$ele->version}}</span>
					</div>
					<div class="listado-item-ele">
						<span>{{$ele->fecha}}</span>
					</div>
					<div class="listado-item-ele" >
						<span id="cartaEstado{{$ele->id}}" data-id="{{$ele->id}}" @if ($ele->estado == 1) data-name="activa"> <b>ACTIVA</b> @else data-name="inactiva" > INACTIVA @endif</span>
					</div>
					<div class="listado-item-ele">
						<span>{{$ele->tipo->nombre}}</span>
					</div>
					<div class="listado-item-ele"><a href="{{'\sistema'.$action.'/'.$ele->id}}/edit"><i class="far fa-edit"></i></a></div>
					<div class="listado-item-ele" id="carta{{ $ele->id }}">
						@if ($ele->estado == 0) 
							<button class="btn btn-info btn-activate"  onclick="javascript:changeEstado({{ $ele->id }})">
							ACTIVAR
							</button>
						@endif
					</div>
				</div>
			@endforeach
		</div>
		@endif
	</div>
	<div class="container-crud">
		<div class="opciones">
			<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default1" ><span class="fa fa-list"></span>  INSTANCIAR</a>
		</div>
		<div class="box-body">
				
				<table class="table table-bordered table-hover dataTable" id="tabla-data-productos">
					<thead>                    	
						<tr>
								<th>#</th>
								<th>PRODUCTO</th>
								<th>CODIGO PRODUCTO</th>
								<th>STOCK</th>
								<th>CATEGORIA</th>
								<th>Quitar</th>
						</tr>                
					</thead>
					<tbody id="productos_body">
						@foreach ($carta_activa->getProductos as $key => $items)
						<tr>
							
							<td>{{$items->id}}</td>
							<td>{{$items->productos[0]['nombre']}}</td>
							<td>{{$items->productos[0]['codigo']}}</td>
										<!--@foreach ($items->productos as  $prod)
											<td>{{$prod->codigo}}</td>
											<td>{{$prod->nombre}}</td>
										@endforeach-->
							<td><input type="number" value="0" min="0" max="1000" step="1"/></td>
							<td>
								<select id="pet-select">
									<option value="">Seleccionar</option>
									<option value="entrada">Entrada</option>
									<option value="extra">Extra</option>
									<option value="bebida">Bebida</option>
								</select>
							</td>
							<td>
										
								<div class="listado-item-ele"><button onclick="eliminarFila({{$items->id}})" class="btn btn-danger">X</button></div>
							</td>
						</tr>
						@endforeach
		
					</tbody>
				</table>
			</div>
	</div>
	<div class="col-xs-12">
		<div class="text-center">
			<button  type="button" class="btn btn-success" id="guardarPedido()">Guardar</button>
		</div>
	</div>
	@include('sistema.carta.modal-producto')
	<script src="{{url('/js/customs/carta/script.js')}}"></script>
@endsection