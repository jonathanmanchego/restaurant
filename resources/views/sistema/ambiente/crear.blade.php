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
		    <input id="{{$head}}Input" value="{{old($head)}}" class="form-control" type="@isset ($tipos[$key]){{$tipos[$key]}}@else text @endif" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif >
		</div>
		@endforeach
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>
</div>	

@endsection