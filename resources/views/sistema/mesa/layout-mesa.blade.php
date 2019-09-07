@extends('layout.sistema')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm-2">
                    <button class="btn btn-primary">Agregar Ambiente</button>
            </div>
            <div class="col-sm-2">
                    <button class="btn btn-primary">B</button>
            </div>
    </div>

</div>
<br>
            <canvas width="800" height="550" id="lienzo"></canvas>
            <button onclick="coordenadas()">Guardar</button>

@endsection
<script>
var cv, cx, objetos, objetoActual = null;
var inicioX = 0, inicioY =0;
var img = new Image();
img.src = '';

function coordenadas()
{
     for (var i = 0; i < objetos.length; i++)
    {
        
        console.log("objeto " + i + ": X = "+ objetos[i].x + " - Y = " + objetos[i].y );
       
    }
}
function actualizar ()
{
	cx.fillStyle = '#7f93a6';
	cx.fillRect(0,0, 800, 550);
    for (var i = 0; i < objetos.length; i++)
    {
        cx.fillStyle = objetos[i].color;
        cx.fillRect(objetos[i].x, objetos[i].y, objetos[i].width, objetos[i].height);
        cx.drawImage(img,objetos[i].x, objetos[i].y , 65, 65);
        cx.font = "10px Arial";
        cx.fillStyle = "#FF0000";
        cx.fillText("Mesa " + (i+1) ,objetos[i].x + 15, objetos[i].y + 30);
        //console.log("obejto " + i + ": X = "+ objetos[i].x + " - Y = " + objetos[i].y );
       
    }
    
}
window.onload = function()
{
objetos = [];
cv = document.getElementById('lienzo');
cx = cv.getContext('2d');

//Agregar ojetos de prueba
objetos.push({
	x: 0, y: 0,
	width: 60, height: 60,
	color: '#cfcfcf'
	});
	objetos.push({
	x: 300, y: 150,
	width: 60, height: 60,
	color: '#cfcfcf'
	});
	actualizar();
	//pc - navegadores
	cv.onmousedown = function(event)
	{
        let coords = cv.getBoundingClientRect();
	    //alert("mouse down");
		for (var i = 0; i < objetos.length; i++)
		{
		    if(objetos[i].x < event.clientX - coords.left && (objetos[i].width + objetos[i].x > event.clientX - coords.left) && objetos[i].y < event.clientY - coords.top && (objetos[i].height + objetos[i].y > event.clientY - coords.top))
		    {
		        objetoActual = objetos[i];
		        inicioY = event.clientY - objetos[i].y;
		        inicioX = event.clientX - objetos[i].x;
		        break;
		    }
        }
        //alert(coords.left + " y " + coords.top);
	};
	cv.onmousemove = function(event)
	{
	    //alert("on mouse");
	    if(objetoActual !== null)
	    {
		    objetoActual.x = event.clientX - inicioX;
		    objetoActual.y = event.clientY - inicioY;
		    actualizar();
	    }

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
		        break;
		    }
		}
	};
	cv.ontouchmove = function(e)
	{
	    //alert("on mouse");
	    if(objetoActual !== null)
	    {
		    objetoActual.x = e.touches[0].clientX - inicioX;
		    objetoActual.y = e.touches[0].clientY - inicioY;
		    actualizar();
	    }

	};
	cv.ontouchend = function(e)
	{
	    //alert("mouse up");
		objetoActual = null;
	}
};
</script>