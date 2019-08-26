@extends('layout.sistema')
@section('slider-carousel')
@parent
@endsection
@section('content')
	@if (session('success'))
		<div class="alert alert-success bglight alert-dismissible" data-auto-dismiss="3000">
			{{session('success')}}
		</div>
	@endif
	@if (session('alerta'))
		<div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Atención!</h4>
			{{session('alerta')}}
		</div>
	@endif
	<h1>SISTEMA</h1>
@endsection
@section("scripts")
<script>
	$(document).ready(function () 
	{
    //Cerrar Las Alertas Automaticamente
		$('.alert[data-auto-dismiss]').each(function (index, element) {
			const $element = $(element),
				timeout = $element.data('auto-dismiss') || 5000;
			setTimeout(function () {
				$element.alert('close');
			}, timeout);
		});
	});
</script>
@endsection