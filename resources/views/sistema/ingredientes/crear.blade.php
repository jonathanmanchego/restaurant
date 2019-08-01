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
		@foreach ($headers as $head)
	  	<div class="form-group">
		    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
		    <input id="{{$head}}Input" class="form-control" type="text" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif >
		</div>
		@endforeach
		<div class="form-group">
		    <label for="unidadMedida">Unidad de Medida</label>
		    <select class="form-control" name="unidadMedida" id="unidadMedida">
				@foreach ($medidas as $unidad)	 
					<option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
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