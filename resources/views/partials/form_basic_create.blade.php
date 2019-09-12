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
			<input id="{{$head}}Input" class="form-control @error($head) is-invalid @enderror" type="@isset ($tipos[$key]){{$tipos[$key]}}@else text @endif" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif value="{{ old($head) }}" >
			@error($head)
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		@endforeach
		{{-- <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" placeholder="Nombre">
		</div> --}}
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>	