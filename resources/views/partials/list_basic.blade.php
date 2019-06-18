<div class="opciones">
	<a class="btn btn-primary" href="{{ url($action.'/create') }}" role="button">
		<i class="fas fa-plus"></i><span>NUEVO</span>
	</a>
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
	</div>
	@foreach ($data as $key => $ele)
		<div class="listado-item">
			@foreach ($headers as $header)
				<div class="listado-item-ele">
					<span>{{$ele->$header}}</span>
				</div>
			@endforeach
			<div class="listado-item-ele"><a href="{{$action.'/'.$ele->id}}/edit"><i class="far fa-edit"></i></a></div>
		</div>
	@endforeach
</div>
@endif