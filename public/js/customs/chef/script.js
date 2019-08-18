async function imprimir(id){
	let data = {
		id : id
	};
	let result = await ajaxRequest('/sistema/orden/detalle',data)
	if( result.out ){
		console.log(result["data"]);
       
        let id=result["data"]["id"] , capacidad=result["data"]["capacidad"] , numeromesa=result["data"]["numero"], estado=result["data"]["estado_mesas_id"] ;
        htmlres= `El id es : ${id} <br> La capcidad es de : ${capacidad} <br>El numero de mesa es : ${numeromesa}<br> El estado de mesa es : ${estado}`;
        $('#formato').html(htmlres);
		jQuery.print('#formato');
    }
}
