@extends('layout.public')

@section('content')

	<h2>Lo más pedido</h2>
	<div class="container">
	<div class="row">
			<div class="col-sm-3">
				<img src="{{url('/uploads/Chicharron de Chancho.jpeg')}}" alt="" class="img-thumbnail imgcut">
			</div>
			<div class="col-sm-3">
				<img src="{{url('/uploads/CHICHARRON DE CUY.jpeg')}}" alt="" class="img-thumbnail imgcut">
			</div>
			<div class="col-sm-3">
				<img src="{{url('/uploads/ROCOTO RELLENO.jpeg')}}" alt="" class="img-thumbnail imgcut">
			</div>
			<div class="col-sm-3">
				<img src="{{url('/uploads/CALDO DE GALLINA.jpeg')}}" alt="" class="img-thumbnail imgcut">
			</div>
			<div class="col-sm-3">
				<img src="{{url('/uploads/PICANTE.jpeg')}}" alt="" class="img-thumbnail imgcut">
			</div>
	</div>
	</div>
	<h2>Promociones</h2>
	<div class="container">
	<div class="row">
			<div class="col-sm-3">
				<img src="{{url('/uploads/promotest.jpg')}}" alt="" class="img-thumbnail imgcut">
			</div>
			<div class="col-sm-3">
				<img src="{{url('/uploads/promotest.jpg')}}" alt="" class="img-thumbnail imgcut">
			</div>
	</div>
	</div>

@endsection

