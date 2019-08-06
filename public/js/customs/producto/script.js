async function addIngrediente(x,y){
	let data = {
		id : $('#idInput').val(),
		ingrediente: x
	};
	let result = await ajaxRequest('/sistema/producto/addIngrediente',data)
	if( result.out ){
		console.log("se envio");
		drawIngrediente(y,2);
    }
}
async function removeIngrediente(x,y){
	let data = {
		id: $('#idInput').val(),
		ingrediente : x
	};
	let result = await ajaxRequest('/sistema/producto/removeIngrediente',data)
	if( result.out ){
		console.log("se envio");
		drawIngrediente(y,1);
    }
}
/**
* x = num del item a añadir
* 
* op = opcion a añadir o eliminar
*/
function drawIngrediente(x,op){
	switch(op){
		case 1://ELIMINARA EL INGREDIENTE DE LA LISTA
			$(`#ingre${x}`).remove();
			break;
		case 2:
			let obj = $(`#ingrediente${x}`)[0].children;
			let ans = `<tr id="ingrediente${x}">`;
			for(let i = 0; i < obj.length;i++){
				ans+=`<td>${obj[i].textContent}</td>`
			}
			ans+='</tr>';
			console.log(ans);
			$('#ingreProducto').append(ans);
			break;
	}
}