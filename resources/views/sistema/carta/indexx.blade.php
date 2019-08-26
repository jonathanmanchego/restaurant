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
		<tabla-carta></tabla-carta>
	</div>
	{{-- @include('sistema.carta.modal-producto') --}}
	<tabla-productos></tabla-productos>
	
@endsection
@include('partials.scripts.index')
<script src="{{url('/js/customs/carta/script.js')}}"></script>