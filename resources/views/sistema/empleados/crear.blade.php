@extends('layout.sistema')
@section('content')
	<div class="container-crud">
	{{-- @if ($errors->any())
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
	@endif --}}
	<form class="form" action="{{url('/sistema'.$action)}}" method="POST">
		@csrf
		@foreach ($headers as $key => $head)
	  	<div class="form-group">
		    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
			<input id="{{$head}}Input" class="form-control @error($head) is-invalid @enderror" type="@isset ($tipos[$key]){{$tipos[$key]}}@else text @endif" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif value="{{ old($head) }}">
			@error($head)
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		@endforeach
		<div class="form-group">
		    <label for="tipo_documento">Tipo Documento</label>
		    <select class="form-control @error('tipo_documento') is-invalid @enderror" name="tipo_documento" id="tipo_documento" value="{{ old('tipo_documento') }}">
				@foreach ($tiposDocs as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
			</select>
			@error('tipo_documento')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="documentoInput">{{strtoupper('N° Documento')}}</label>
			<input id="documentoInput" class="form-control @error('nrodocumento') is-invalid @enderror" type="text" name="nrodocumento" placeholder="Documento" value="{{ old('nrodocumento') }}">
			@error('nrodocumento')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="TipoEmp">Tipo Empleados</label>
		    <select class="form-control @error('tipo_empleado') is-invalid @enderror" name="tipo_empleado" id="TipoEmp" value="{{ old('tipo_empleado') }}">
				@foreach ($tiposEmpleados as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
			</select>
			@error('tipo_empleado')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
		    <label for="zona_">Zona</label>
		    <select class="form-control @error('zona_') is-invalid @enderror" name="zona_" id="zona_" value="{{ old('zona_') }}">
				@foreach ($zonas as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
			</select>
			@error('zona_')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control @error($head) is-invalid @enderror" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>	
@endsection