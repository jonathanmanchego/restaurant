@extends('layout.sistema')
@section('headers')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('content')
	<div class="container-crud">
		<form class="form" action="{{url('/sistema'.$action)}}" method="POST" enctype="multipart/form-data">
				@csrf
			    @method('PUT')
				@foreach ($headers as $head)
				  	<div class="form-group">
					    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
					    <input id="{{$head}}Input" class="form-control" type="text" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif value="{{$data->$head}}">
					</div>
				@endforeach
				
			  {{-- <div class="form-group">
			    <label for="idInput">ID</label>
			    <input id="idInput" class="form-control" type="text" readonly value="{{$data->id}}">
			  </div>
			  <div class="form-group">
			    <label for="nombreInput">NOMBRE</label>
			    <input type="text" name="nombre" class="form-control" id="nombreInput" aria-describedby="emailHelp" value="{{$data->nombre}}" placeholder="Nombre">
			  </div> --}}
			  <button type="submit" class="btn btn-primary">GUARDAR</button>
			  <button form="del" type="submit" class="btn btn-danger">ELIMINAR</button>
		</form>
		<form id="del" action="{{url('/sistema'.$action)}}" method="POST">
			@csrf
			@method('DELETE')
		</form>
		<form class="form" action="{{url('/sistema'.$action.'/slider')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
			    <label for="imgInput1">IMAGENES</label>
			    <input id="imgInput1" class="form-control" type="file" name="imagen[]">
			</div>
			<div class="form-group">
			    <label for="imgInput2">IMAGENES</label>
			    <input id="imgInput2" class="form-control" type="file" name="imagen[]">
			</div>
			<div class="form-group">
			    <label for="imgInput3">IMAGENES</label>
			    <input id="imgInput3" class="form-control" type="file" name="imagen[]">
			</div>
			<button type="submit" class="btn btn-primary">SUBIR SLIDER</button>
		</form>
	</div>
@endsection
{{-- @section('scripts')
<script type="text/javascript" src="{{url('/js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{url('/js/customs/restaurant/script.js')}}"></script>
@endsection --}}