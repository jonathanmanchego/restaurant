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
		<a class="btn btn-primary" href="{{ url('/sistema'.$action.'/create') }}" role="button">
			<i class="fas fa-plus"></i><span>NUEVO</span>
		</a>
	</div>
	@if (!empty($data[0]))
	<div class="listado w-100">
		<div class="listado-headers">
			@foreach ($headers as $header)
				<div class="listado-header-item">
					<span>{{strtoupper($header)}}</span>
				</div>
			@endforeach
			<div class="listado-header-item">
				<span>ESTADO</span>
			</div>
			<div class="listado-header-item">
				<span>VER/EDITAR</span>
			</div>
		</div>
		@foreach ($data as $key => $ele)
			<div class="listado-item">
				@foreach ($headers as $header)
					<div class="listado-item-ele">
						<span>{{$ele->$header}}</span>
					</div>
				@endforeach
					
				<div class="listado-item-ele"><a href="{{'\sistema'.$action.'/'.$ele->id}}/edit"><i class="far fa-edit"></i></a></div>
			</div>
		@endforeach
	</div>
	@endif
</div>
@endsection