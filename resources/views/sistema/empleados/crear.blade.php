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
	<form class="form" action="{{url('/sistema'.$action)}}" method="POST">
		@csrf
		@foreach ($headers as $key => $head)
	  	<div class="form-group">
		    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
		    <input id="{{$head}}Input" class="form-control" type="@isset ($tipos[$key]){{$tipos[$key]}}@else text @endif" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif >
		</div>
		@endforeach
		<div class="form-group">
		    <label for="tipo_documento">Tipo Documento</label>
		    <select class="form-control" name="tipo_documento" id="tipo_documento">
				@foreach ($tiposDocs as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
		    </select>
		</div>
		<div class="form-group">
		    <label for="documentoInput">{{strtoupper('N° Documento')}}</label>
		    <input id="documentoInput" class="form-control" type="text" name="nrodocumento" placeholder="Documento" >
		</div>
		<div class="form-group">
		    <label for="TipoEmp">Tipo Empleados</label>
		    <select class="form-control" name="tipo_empleado" id="TipoEmp">
				@foreach ($tiposEmpleados as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
		    </select>
		</div>
		<div class="form-group">
		    <label for="zona_">Zona</label>
		    <select class="form-control" name="zona_" id="zona_">
				@foreach ($zonas as $tipo)	 
					<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
				@endforeach
		    </select>
		</div>
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>	
@endsection