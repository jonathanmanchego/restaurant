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
<<<<<<< Updated upstream
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
=======
	var nombreMes = {'1' : 'Enero','2' : 'Febrero','3' : 'Marzo','4' : 'Abril','5' : 'Mayo','6' : 'Junio','7' : 'Julio','8' : 'Agosto','9' : 'Septiembre','10' : 'Octubre','11' : 'Noviembre','12' : 'Diciembre'}
    var coloresArr = ['rgb(255, 99, 132)',  'rgb(255, 159, 64)','rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)', 'rgb(201, 203, 207)'];

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
	async function obtenerDatos(year){
		var data = {
			year : year
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
			for (let index = 0; index < x.data.length; index++) {
				if(contador === 5){
					contador = 0;	
				}
				arrColor.push(coloresArr[contador]);	
				contador++;
			}
		 console.log(x.data);
		 	crearGrafico("myChart2" ,"bar", meses, valores, arrColor, "Ventas S/.");
		}	
	}
window.onload = function()
{
	
	obtenerDatos(2019);
	crearGrafico("myChart1" ,"line", ['col1','col2','col3'], [5,9,15], ['rgb(66, 134, 244,0.5)','rgb(74, 135, 72,0.5)','rgb(229, 89, 50,0.5)'], "Titulo1");
	
>>>>>>> Stashed changes
}
</script>
@endsection