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
		    <input id="idInput" class="form-control" name="id" placeholder="0" readonly>
		</div>
		<div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input id="nombreInput" class="form-control" name="nombre" placeholder="nombre">
		</div>
		<div class="form-group">
		    <label for="descInput">DESCRIPCION</label>
		    <input id="descInput" class="form-control" name="descripcion" placeholder="descripcion">
		</div>
		<div class="form-group">
		    <label for="precInput">PRECIO</label>
		    <input id="precInput" type="number" class="form-control" name="precio" placeholder="0,00" step="0.01">
		</div>
		<div class="form-group">
		    <label for="codInput">CODIGO</label>
		    <input id="codInput" class="form-control" name="codigo" placeholder="#af342" >
		</div>
		<div class="form-group">
		    <label for="tEsInput">TIEMPO DE ESPERA</label>
		    <input id="tEsInput" class="form-control" type="number" name="tiempo_espera" placeholder="En minutos" >
		</div>
		<div class="form-group">
			<label for="categoriaInput">CATEGORIA</label>
			<select name="categoria" class="form-control" id="">
				@foreach ($categorias as $cate)
					<option value="{{$cate->id}}">{{$cate->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
		    <label for="ImagenInput">IMAGEN</label>
		    <input id="ImagenInput" class="form-control-file" type="file" name="image" >
		</div>
		<div class="form-group">
		    <label for="VideoInput">VIDEO</label>
		    <input id="VideoInput" class="form-control-file" type="file" name="video" >
		</div>
		<div class="form-group">
			<label>ESTADO DEL PRODUCTO</label>
			<div class="form-check form-check-inline">
			  	<input class="form-check-input" type="radio" id="boxEliminado" name="eliminado" value="0">
			  	<label class="form-check-label" for="boxEliminado">Inactivo</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="box2Eliminado" name="eliminado" value="1">
			  	<label class="form-check-label" for="box2Eliminado">Activo</label>
			</div>
		</div>
		<div class="form-group">
		    <label for="FechaInput">FECHA VALIDEZ</label>
		    <input id="FechaInput" class="form-control" type="date" name="fecha_validez" >
		</div>
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>

@endsection
