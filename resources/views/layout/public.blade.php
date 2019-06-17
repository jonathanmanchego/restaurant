<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<link rel="stylesheet" type="text/css" href="{{url('/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/css_boot/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
</head>
<body>
	<div class="wrapp">
		<nav class="wrapp_nav">
			<div class="logo-space">
				<img src="/img/logoPrincipal.png">
			</div>
			<ul>
				<li><a href="{{url('/')}}"><span>INICIO</span></a></li>
				<li><a href="{{url('/productos')}}"><span>PRODUCTOS</span></a></li>
				<li><a href="{{url('/articulos')}}"><span>ARTICULOS</span></a></li>
				<li><a class="toBuy" href="{{url('/pedido')}}"><i class="far fa-clipboard"></i></a></li>
				<li><a href="{{url('/sistema')}}"><span>SISTEMA</span></a></li>
			</ul>
		</nav>
		{{-- SLIDER BOOTSTRAP --}}
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="{{ url('img/slider/slider1.jpg')}}" class="d-block w-100" alt="">
		    </div>
		    <div class="carousel-item">
		      <img src="{{ url('img/slider/slider2.jpg')}}" class="d-block w-100" alt="">
		    </div>
		    {{-- <div class="carousel-item">
		      <img src="..." class="d-block w-100" alt="...">
		    </div> --}}
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon arrow" aria-hidden="true "></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon arrow" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		{{-- CONTENIDO DE LAYOUT --}}
		<div class="wrapp-content">
			<div class="content">
			@section('content')
				@show
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="/js/js_boot/bootstrap.min.js"></script>
</body>
</html>