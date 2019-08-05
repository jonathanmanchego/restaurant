async function addIngrediente(x){
	let data = {
		id : $('#idInput').val(),
		ingrediente: x
	};
	let result = await ajaxRequest('/sistema/producto/addIngrediente',data)
	if( result.out ){
		console.log("se envio");
    }
}