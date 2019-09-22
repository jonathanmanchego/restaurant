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
	var nombreMes = {'1' : 'Enero','2' : 'Febrero','3' : 'Marzo','4' : 'Abril','5' : 'Mayo','6' : 'Junio','7' : 'Julio','8' : 'Agosto','9' : 'Septiembre','10' : 'Octubre','11' : 'Noviembre','12' : 'Diciembre'}
    var coloresArr = ['rgb(255, 99, 132)',  'rgb(255, 159, 64)','rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)', 'rgb(201, 203, 207)'];
	var areaChartOptions;
	function crearGrafico(idCanvas, tipoGrafico, etiquetas, valores, colores, titulo)
	{
		
		if(tipoGrafico === "pie"){
			areaChartOptions = {
				responsive : true,
				scales:{yAxes:[{ticks:{beginAtZero:true}}]}
			}
		}else
		{
			areaChartOptions = {
				responsive : true,
				scales:{yAxes:[{ticks:{beginAtZero:true}}]},
				legend: {display: false}
			}
		}
		if(tipoGrafico === "line"){
			colores = 'rgba(60,141,188,0.9)';
		}
		
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
			options: areaChartOptions
		});
	}
	async function obtenerDatos(idChart, tipoChart ,parametro, desChart){
		var data = {
			year : parametro
		};
    	//console.log("val ... "+year);
    	let x = await ajaxRequest('/sistema/dashboard',data);
    	if(x.out)
		{

			var meses = x.data.map(function(mesnum){
				return nombreMes[mesnum.mes]
			})
			var valores = x.data.map(function(valor){
				return valor.total_ventas
			})
			let contador = 0;
			var arrColor = [];
			for (let index = 0; index < x.data.length; index++){
				if(contador === 5){contador = 0;}
				arrColor.push(coloresArr[contador]);	
				contador++;
			}
		 //console.log(x.data);
		 	crearGrafico(idChart ,tipoChart, meses, valores, arrColor, desChart);
		}	
	}
window.onload = function()
{
	
	obtenerDatos("myChart2", "bar", 2019, "Ventas S/.");
	obtenerDatos("myChart1" ,"line", 2019, "Ventas S/.");
	obtenerDatos("myChart3" ,"pie", 2019, "Ventas S/.");
	
}
</script>
@endsection