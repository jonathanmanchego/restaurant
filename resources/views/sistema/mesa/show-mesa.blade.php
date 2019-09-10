@extends('layout.sistema')
@section('content')
<div class="container">
    <div class="row">
		@foreach ($data as $key => $ele)
			<div class="col-md-3 ">
				<button class="btn btn-primary form-control" onclick="cambiarCanvas({{$ele->id}})">{{$ele->nombre}}</button>
			</div>
		@if($key == 3 || $key == 7)
		</div><br>
		<div class="row">
		@endif
		@endforeach
			<div class="col-md-3">
				<a class="btn btn-primary form-control" href="{{ url('/sistema/ambiente') }}" role="button">Agregar Ambiente</a>
			</div>
    </div>
</div><br><br>
<div id="nombre_ambiente"></div>
	<canvas width="800" height="550" id="lienzo"></canvas><br>
	<button onclick="saveCoords()" class="btn btn-success">Guardar</button>
@endsection
<script>
var cv, cx, objetos, objetoActual = null, objetoAnterior= null;
var inicioX = 0, inicioY =0;
var img = new Image();
img.src = '';

async function saveCoords()
{
	let coordenadasxy = "";
     for (var i = 0; i < objetos.length; i++)
    {
       //console.log("objeto " + i + ": X = "+ parseInt(objetos[i].x) + " - Y = " + parseInt(objetos[i].y) );
	   coordenadasxy += objetos[i].idMesa + "*" + parseInt(objetos[i].x) + "/" + parseInt(objetos[i].y) + "|";
    }
	console.log(coordenadasxy);
	let data = { coordenadasxy: coordenadasxy };
	let x = await ajaxRequest('/sistema/mesas_layout/save',data);
    if(x.out){
     console.log(x.data + " OK");
    }
}
function actualizar ()
{
	cx.fillStyle = '#7f93a6';
	cx.fillRect(0,0, 800, 550);
    for (var i = 0; i < objetos.length; i++)
    {
		let mesax = parseInt(objetos[i].x) , mesay= parseInt(objetos[i].y);
        cx.fillStyle = objetos[i].color;
        cx.fillRect(mesax, mesay, objetos[i].width, objetos[i].height);
        cx.drawImage(img,mesax, mesay , 65, 65);
        cx.font = "10px Arial"; cx.fillStyle = "#FF0000";
        cx.fillText(objetos[i].name , mesax + 5, mesay + 30);
        //console.log("obejto " + i + ": X = "+ objetos[i].x + " - Y = " + objetos[i].y );
	} 
}
async function cambiarCanvas(id){
	/*objetos = [];
	objetos.push({
	x: 0, y: 0,
	width: 60, height: 60,
	color: '#cfcfcf',
	name : 'MESA TEST'
	});
	
	actualizar();*/
	let data = {idAmbiente: id};
	
	let x = await ajaxRequest('/sistema/mesas_layout/cambiarAmbiente',data);
	if(x.out)
	{
		//console.log(JSON.stringify(x.data) + " LISTO " + x.data[0]['capacidad']);
		objetos = [];
		if(x.data.length > 0){
			let pos = 0;
			let posx= pos , posy = pos; 
			for (let mesa of x.data) 
			{
				if(mesa.coordenadas != null){
					var mesaxy = mesa.coordenadas.split("/", 2);
					posx= parseInt(mesaxy[0]) ; 
					posy = parseInt(mesaxy[1]);
				}
				//console.log(mesa.capacidad);
				objetos.push({
				x: posx, y: posy,
				width: 60, height: 60,
				color: '#cfcfcf',
				name : 'MESA ' + mesa.numero,
				idMesa : mesa.id
				});
				pos = pos + 10;
			}
			
		}
		actualizar();
    }
}
async function selectMesa(idMesa){
	//alert("gaaaaaa"+idMesa);
	let data = {idMesa: idMesa};
	let x = await ajaxRequest('/sistema/orden/selectMesa',data);
	if(x.out){
		console.log(x.data);
	}
	
}
window.onload = function()
{
cv = document.getElementById('lienzo');
cx = cv.getContext('2d');
//pc - navegadores
	cv.onmousedown = function(event)
	{
        let coords = cv.getBoundingClientRect();
	    //alert("mouse down");
		for (var i = 0; i < objetos.length; i++)
		{
		    if(objetos[i].x < event.clientX - coords.left && (objetos[i].width + objetos[i].x > event.clientX - coords.left) && objetos[i].y < event.clientY - coords.top && (objetos[i].height + objetos[i].y > event.clientY - coords.top))
		    {
				if(objetoAnterior !== null){
					objetoAnterior.color = "#cfcfcf";
				}
		        objetoActual = objetos[i];
		        inicioY = event.clientY - objetos[i].y;
                inicioX = event.clientX - objetos[i].x;
				objetoActual.color = "#00a65a";
				objetoAnterior = objetos[i];
				//console.log(objetoActual.idMesa);
				selectMesa(objetoActual.idMesa);
                actualizar();
		        break;
		    }
        }
        //alert(coords.left + " y " + coords.top);
	};
	cv.onmouseup = function(event)
	{
	    //alert("mouse up");
		objetoActual = null;
	}
    //celulares
    cv.ontouchstart = function(e)
	{
        let coords = cv.getBoundingClientRect();
	    //alert("touch down");
		for (var i = 0; i < objetos.length; i++)
		{
		    if(objetos[i].x < e.touches[0].clientX - coords.left && (objetos[i].width + objetos[i].x > e.touches[0].clientX - coords.left) && objetos[i].y < e.touches[0].clientY - coords.top && (objetos[i].height + objetos[i].y > e.touches[0].clientY - coords.top))
		    {
		        objetoActual = objetos[i];
		        inicioY = e.touches[0].clientY - objetos[i].y;
                inicioX = e.touches[0].clientX - objetos[i].x;
                console.log(objetoActual.name);
		        break;
		    }
		}
	};
	cv.ontouchend = function(e)
	{
	    //alert("mouse up");
		objetoActual = null;
	}
};
</script>