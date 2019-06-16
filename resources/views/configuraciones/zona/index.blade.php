@extends('layout.public')


@section('content')
	<div class="listado">
		<div class="listado-headers">
			<div class="listado-header-item">
				<span>ID</span>
			</div>
			<div class="listado-header-item">
				<span>NOMBRE</span>
			</div>
			<div class="listado-header-item">
				<span>VER/EDITAR</span>
			</div>
		</div>
		@foreach ($zonas as $zona)
			<div class="listado-item">
				<div class="listado-item-ele">
				    <span>{{$zona->id}}</span>
				</div>
				<div class="listado-item-ele">
				    <span>{{$zona->nombre}}</span>
				</div>
				<div class="listado-item-ele"><a href="/zona/{{$zona->id}}/edit"><i class="far fa-edit"></i></a></div>
			</div>
		@endforeach
	</div>
	<div class="opciones">
		<a class="btn btn-primary" href="{{ url('/zona/create') }}" role="button"><i class="fas fa-plus"></i></a>
	</div>
@endsection