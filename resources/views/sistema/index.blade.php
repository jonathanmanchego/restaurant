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
	@include('sistema.dashboard.index')
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
	var nombreMes = {
    '1' : 'Enero',
    '2' : 'Febrero',
    '3' : 'Marzo',
    '4' : 'Abril',
    '5' : 'Mayo',
    '6' : 'Junio',
    '7' : 'Julio',
    '8' : 'Agosto',
    '9' : 'Septiembre',
    '10' : 'Octubre',
	'11' : 'Noviembre',
	'12' : 'Diciembre'}
    
	function crearGrafico(idCanvas, tipoGrafico, etiquetas, valores, colores, titulo)
	{
		var ctx= document.getElementById(idCanvas).getContext("2d");
		var myChart= new Chart(ctx,{
			type:tipoGrafico,
			data:{
				labels: etiquetas,
				datasets:[{
						label:titulo,
						data: valores,
						backgroundColor: colores
				}]
			},
			options:{
				scales:{
					yAxes:[{ticks:{beginAtZero:true}}]
				}
			}
		});
	}
	async function obtenerDatos(val){
	var data = {
		year : val
    };
    console.log("val ... "+val);
    let x = await ajaxRequest('/sistema/dashboard',data);
    	if(x.out){
		 var meses = x.data.map(function(mesnum){
			 return mesnum.mes
		 })
		 var valores = x.data.map(function(valor){
			 return valor.total_ventas
		 })
		 console.log(valores);
		 crearGrafico("myChart2" ,"bar", nombreMes[meses], valores, ['rgb(66, 134, 244,0.5)','rgb(74, 135, 72,0.5)','rgb(229, 89, 50,0.5)'], "Titulo2");
		}	
	}
window.onload = function()
{
	
	obtenerDatos("ok");
	crearGrafico("myChart1" ,"line", ['col1','col2','col3'], [5,9,15], ['rgb(66, 134, 244,0.5)','rgb(74, 135, 72,0.5)','rgb(229, 89, 50,0.5)'], "Titulo1");
	
}
</script>
@endsection