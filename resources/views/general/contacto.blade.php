@extends('layout.public')
@section('content')
<div class="page-header" style="background-color: rgba(0, 0, 0, 0.6); background-image: url(/img/bannertest.jpg); text-shadow: black 1px 1px 5px; background-position: 50% -7.4px;" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Contacto</h1>
            </div>
        </div>
    </div>
</div><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
            <!--Google map-->
            <div >
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.0809090805606!2d-70.90973073673047!3d-17.17157384409915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91449c27e369dde3%3A0xd5778cb6e70c49a4!2s%22La+Chosita%22+Restaurant+-+Cuyeria!5e0!3m2!1ses!2spe!4v1566402053902!5m2!1ses!2spe" frameborder="0" style="border:0" allowfullscreen   height="500"></iframe>
            </div>
            </div>
            <div class="col-sm-5">
				<h2 align="center">Visítanos</h2>
				<h3>Ubicación</h3>
				<p>
					<i class="fa fa-fw fa-map-marker"></i> Moquegua - Moquegua calle Nro 99<br>
				</p>
				<h3>Horario de atención</h3>
				<p>
                    <i class="fa fa-fw fa-clock-o"></i> 
                    Lunes a Viernes: 10:00 a 16:00 Hrs. <br>
                    <i class="fa fa-fw fa-clock-o"></i> 
                    Sabado: 9:00 a 18:00 Hrs.</p>
				<h3>Email</h3>
				<p>
					<i class="fa fa-fw fa-envelope-o"></i> restaurant@nombrerestaurant.com</p>
				<h3>Celular</h3>
				<p>
					<i class="fa fa-fw fa-mobile"></i> +51 999 999 999 / +51 888 888 888</p>
				<h3>Teléfono</h3>
				<p>
					<i class="fa fa-fw fa-phone"></i> +51 99 99 9999</p>
		
            </div>
        </div>
    </div>
@endsection