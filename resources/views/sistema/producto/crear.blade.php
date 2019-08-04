@extends('layout.sistema')
@section('content')
<div class="container-crud d-flex">
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
	<form class="form col-md-6" action="{{url('/sistema'.$action)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@foreach ($headers as $key => $head)
	  	<div class="form-group">
		    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
		    <input id="{{$head}}Input" class="form-control" type="@isset ($tipos[$key]){{$tipos[$key]}}@else text @endif" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif >
		</div>
		@endforeach
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
			  	<input class="form-check-input" type="checkbox" id="boxEliminado" name="eliminado" value="0">
			  	<label class="form-check-label" for="boxEliminado">Inactivo</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="box2Eliminado" name="eliminado" value="1">
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
<div class="col-md-6">
	<button id="" type="button" class="btn btn-primary btn-flat w-50" data-toggle="modal" data-target="#modal-datos" ><span class="fa fa-list"></span>  LISTA DE INGREDIENTES</button>
</div>
@include('sistema.producto.modal_datos')
@endsection
