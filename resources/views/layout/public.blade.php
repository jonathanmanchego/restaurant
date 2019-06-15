<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/css/css_boot/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<div class="wrapp">
		<nav class="wrapp_nav">
			<div class="logo-space">
				<img src="/img/logoPrincipal.png">
			</div>
			<ul>
				<li><a href="">INICIO</a></li>
				<li><a href="">PRODUCTOS</a></li>
				<li><a href="">ARTICULOS</a></li>
				<li><a href="">PEDIDO</a></li>
				<li><a href="">LOGIN</a></li>
			</ul>
		</nav>
		{{-- SLIDER BOOTSTRAP --}}
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="img/slider/slider1.jpg" class="d-block w-100" alt="">
		    </div>
		    <div class="carousel-item">
		      <img src="img/slider/slider2.jpg" class="d-block w-100" alt="">
		    </div>
		    {{-- <div class="carousel-item">
		      <img src="..." class="d-block w-100" alt="...">
		    </div> --}}
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		{{-- CONTENIDO DE LAYOUT --}}
		<div class="wrapp-content">
			@section('content')
				@show
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="/js/js_boot/bootstrap.min.js"></script>
</body>
</html>