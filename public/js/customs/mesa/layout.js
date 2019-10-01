var cv, cx, objetos, objetoActual = null;
var inicioX = 0, inicioY =0;
var img = new Image();
img.src = '/img/layoutmesas/mesa.png';
var fondo = new Image();
fondo.src = '/img/layoutmesas/fondo_layout.jpg';
async function saveCoords()
{
	let coordenadasxy = "";
     for (var i = 0; i < objetos.length; i++){
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
	cx.fillStyle = '#7f93a6';//color si no carga la imagen
	cx.fillRect(0,0, 800, 550);
	cx.drawImage(fondo,0, 0, 800, 550);
	//cx.fillRect(0,0, 800, 550);
    for (var i = 0; i < objetos.length; i++){
		let mesax = parseInt(objetos[i].x) , mesay= parseInt(objetos[i].y);
        //cx.fillStyle = objetos[i].color;
        //cx.fillRect(mesax, mesay, objetos[i].width, objetos[i].height);
        cx.drawImage(img,mesax, mesay , 60, 60);
        cx.font = "12px Arial"; cx.fillStyle = "#ffffff";
        cx.fillText(objetos[i].name , mesax + 12, mesay + 35);
        //console.log("obejto " + i + ": X = "+ objetos[i].x + " - Y = " + objetos[i].y );
	} 
}
async function cambiarCanvas(valuename){
    let ambVal = document.getElementById("selectAmbiente").value.split("/", 2);
    let id = ambVal[0];
    document.getElementById("ambienteNombre").innerHTML =  ambVal[1];
	let data = {idAmbiente: id};
	let x = await ajaxRequest('/sistema/mesas_layout/cambiarAmbiente',data);
	if(x.out){//console.log(JSON.stringify(x.data) + " LISTO " + x.data[0]['capacidad']);
		objetos = [];
		if(x.data.length > 0){
			let pos = 0;
			let posx , posy; 
			for (let mesa of x.data) 
			{	if(mesa.coordenadas != null){
					var mesaxy = mesa.coordenadas.split("/", 2);
					posx= parseInt(mesaxy[0]) ; 
					posy = parseInt(mesaxy[1]);
				}
				else
				{
					posx= pos ;
					posy = pos; 
					pos = pos + 10;
				}
				objetos.push({
				x: posx, y: posy,
				width: 60, height: 60,
				color: '#cfcfcf', 
				name : 'Nro ' + mesa.numero, idMesa : mesa.id
				});
				
			}	
		}
		actualizar();
    }
}
window.onload = function()
{
cv = document.getElementById('lienzo');
cx = cv.getContext('2d');
cambiarCanvas();
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