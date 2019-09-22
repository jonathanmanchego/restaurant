@extends('layout.sistema')
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
	<div class="row">
		<div class="col-sm-4 chart">
			<canvas id="myChart1" width="400" height="400"></canvas>
		</div>
		<div class="col-sm-4 chart">
			<canvas id="myChart2" width="400" height="400"></canvas>
		</div>
		<div class="col-sm-4 chart">
			<canvas id="myChart3" width="400" height="400"></canvas>
		</div>
	</div>
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
<script>
function crearGrafico(idCanvas, tipoGrafico, etiquetas, valores, colores, titulo){
	var ctx= document.getElementById(idCanvas).getContext("2d");
	var myChart= new Chart(ctx,{
		type:tipoGrafico,
		data:{
			labels: etiquetas,
			datasets:[{
					
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
window.onload = function()
{
	crearGrafico("myChart1" ,"line", ['col1','col2','col3'], [5,9,15], ['rgb(66, 134, 244,0.5)','rgb(74, 135, 72,0.5)','rgb(229, 89, 50,0.5)'], "Titul");
	crearGrafico("myChart2" ,"bar", ['col1','col2','col3'], [5,9,15], ['rgb(66, 134, 244,0.5)','rgb(74, 135, 72,0.5)','rgb(229, 89, 50,0.5)'], "Titulo");
	/*var ctx= document.getElementById("myChart1").getContext("2d");
	var myChart= new Chart(ctx,{
		type:"pie",
		data:{
			labels:['col1','col2','col3'],
			datasets:[{
					label:'Num datos',
					data:[10,9,15],
					backgroundColor:[
						'rgb(66, 134, 244,0.5)',
						'rgb(74, 135, 72,0.5)',
						'rgb(229, 89, 50,0.5)'
					]
			}]
		},
		options:{
			scales:{
				yAxes:[{ticks:{beginAtZero:true}}]
			}
		}
	});

	var ctx2= document.getElementById("myChart2").getContext("2d");
	var myChart= new Chart(ctx2,{
		type:"line",
		data:{
			labels:['col1','col2','col3'],
			datasets:[{
					label:'Num datos',
					data:[3,9,12],
					backgroundColor:[
						'rgb(66, 134, 244,0.5)',
						'rgb(74, 135, 72,0.5)',
						'rgb(229, 89, 50,0.5)'
					]
			}]
		},
		options:{
			scales:{
				yAxes:[{ticks:{beginAtZero:true}}]
			}
		}
	});
	var ctx3= document.getElementById("myChart3").getContext("2d");
	var myChart= new Chart(ctx3,{
		type:"bar",
		data:{
			labels:['col1','col2','col3'],
			datasets:[{
					label:'Ventas',
					data:[3,9,12],
					backgroundColor:[
						'rgb(66, 134, 244,0.5)',
						'rgb(74, 135, 72,0.5)',
						'rgb(229, 89, 50,0.5)'
					]
			}]
		},
		options:{
			scales:{
				yAxes:[{ticks:{beginAtZero:true}}]
			}
		}
	});*/
}
</script>
@endsection