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
								<th>PRECIO</th>
								<th>CATEGORIA</th>
								<th>Quitar</th>
						</tr>                
					</thead>
					<tbody id="carta_items">
						@foreach ($carta_activa->getProductos as $key => $items)
						<tr id="ele-carta-item-{{$items->id}}">
							
							<td>{{$items->id}}</td>
							<td>{{$items->nombre}}</td>
							<td>{{$items->codigo}}</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example" style="display:flex">
						            <button onclick="javascript:remove({{$items->id}})" type="button" class="btn btn-primary"> - </button>
						            <span class="borde border-secondary text-center form-control-plaintext" id="counter_{{$items->id}}" style="width:15%">{{$productos_actual[$key]->stock}}</span>
						            <button onclick="javascript:add({{$items->id}})" type="button" class="btn btn-danger"> + </button>
						        </div>
							</td>
							<td>
								{{$items->precio}}
							</td>
							<td>
								{{$items->categoria->nombre}}
							</td>
							<td>
								<button class="btn btn-danger" onclick="eliminarProd({{$items->id}})"><span class="fa fa-close"></span></button>
							</td>
						</tr>
						@endforeach
		
					</tbody>
				</table>
			</div>
	</div>
	<div class="col-xs-12">
		<div class="text-center">
			<button  type="button" class="btn btn-success" onclick="guardarPedido()">Guardar</button>
		</div>
	</div>
	@include('sistema.carta.modal-producto')
	@include('partials.scripts.index')
	<script src="{{url('/js/customs/carta/script.js')}}"></script>
@endsection