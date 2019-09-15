@extends('layout.sistema')
@section('content')
<div class="container-crud">
	@if ($errors->any())
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form class="form" action="{{url('/sistema'.$action)}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		    <label for="idInput">ID</label>
		    <input id="idInput" class="form-control" name="id" placeholder="0" readonly value="{{ old('id') }}">
		</div>
		<div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
			<input id="nombreInput" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="nombre">
			@error('nombre')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="descInput">DESCRIPCION</label>
			<input id="descInput" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" placeholder="descripcion">
			@error('descripcion')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="precInput">PRECIO</label>
			<input id="precInput" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" placeholder="0,00" step="0.01">
			@error('precio')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="codInput">CODIGO</label>
			<input id="codInput" class="form-control @error('codigo') is-invalid @enderror" name="codigo" placeholder="#af342" >
			@error('codigo')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="tEsInput">TIEMPO DE ESPERA</label>
			<input id="tEsInput" class="form-control @error('tiempo_espera') is-invalid @enderror" type="number" name="tiempo_espera" placeholder="En minutos" >
			@error('tiempo_espera')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label for="categoriaInput">CATEGORIA</label>
			<select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="">
				@foreach ($categorias as $cate)
					<option value="{{$cate->id}}">{{$cate->nombre}}</option>
				@endforeach
			</select>
			@error('categoria')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label >IMAGEN</label>
			<div class="custom-file">
				<input id="ImagenInput" class="custom-file-input @error('image') is-invalid @enderror" type="file" name="image" >
				<label for="ImagenInput" class="custom-file-label">IMAGEN</label>
				@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label>VIDEO</label>
			<div class="custom-file">
				<input id="VideoInput" class="custom-file-input @error('video') is-invalid @enderror" type="file" name="video" >
				<label for="VideoInput" class="custom-file-label">VIDEO</label>
				@error('video')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="form-group" >
			<label>ESTADO DEL PRODUCTO</label><br>
			<div class="form-check form-check-inline">
			  	<input class="form-check-input" type="radio" id="boxEliminado" name="eliminado" value="0">
			  	<label class="form-check-label" for="boxEliminado">Inactivo</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="box2Eliminado" name="eliminado" value="1">
			  	<label class="form-check-label" for="box2Eliminado">Activo</label>
			</div>
			@error('eliminado')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="FechaInput">FECHA VALIDEZ</label>
		    <input id="FechaInput" class="form-control @error('fecha_validez') is-invalid @enderror" type="date" name="fecha_validez" value="{{ old('fecha_validez') }}" >
		</div>
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>

@endsection
