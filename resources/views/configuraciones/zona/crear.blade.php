@extends('layout.public')
@section('content')
	<form class="form" action="/zona" method="POST">
		@csrf
	  <div class="form-group">
	    <label for="exampleInputPassword1">ID</label>
	    <input id="exampleInputPassword1" class="form-control" type="text" placeholder="0" readonly>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">NOMBRE</label>
	    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
	    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection