@extends('layout.sistema')
@section('content')
	@if (session('success'))
		<div class="alert alert-success bglight">{{session('success')}}</div>
	@endif
	<h1>SISTEMA</h1>
@endsection