<div class="container-crud">
	<form class="form" action="{{url($action)}}" method="POST">
		@csrf
		@foreach ($headers as $head)
	  	<div class="form-group">
		    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
		    <input id="{{$head}}Input" class="form-control" type="text" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif >
		</div>
		@endforeach
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>	