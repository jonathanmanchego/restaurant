async function changeEstado(id){
	
	var data = {
        id
	};
    let result = await ajaxRequest('/sistema/carta/change-state',data);
    console.log(result);
	if(result.out){
        console.log(result);
        changeData(result,id);
    }
}
// async function ajaxRequest (url, data) {
// 	data._token = $('input[name=_token]').val();
//     $.ajax({
//         url: url,
//         type: 'POST',
//         data: data,
//         success: function (ans) {
//         	// console.log(ans);
//         	changeData();
//         }
//     }).fail((x)=>{
//     	console.log(x);
//     });
// }
function changeData(ans,lx){
    $(`button`).remove('.btn-activate');
    $(`#carta${ans.data.id}`).append(`<button class='btn btn-info btn-activate' 
        id='carta${ans.data.id}' onclick='javascript:changeEstado(${ans.data.id})'>
                ACTIVAR
                </button>`);
    $(`#cartaEstado${ans.data.id}`).empty();
    $(`#cartaEstado${lx}`).empty();
    $(`#cartaEstado${ans.data.id}`).append("INACTIVA");
    $(`#cartaEstado${ans.data.id}`)[0].dataset.name = "inactiva";
    $(`#cartaEstado${lx}`).append("<b>ACTIVA</b>");
    $(`#cartaEstado${lx}`)[0].dataset.name = 'activa';
}
////////////////////
/**
*DONOVAN XD
*/

// INSTANCIANDO CARTA SCRIPTS
async function agregarProd(x){
    // $('#btn-agregarprod').click(async()=>{
        valores = x.value;
        valor_item = valores.split("*");
        var data = {
            carta_id: $('span[data-name=activa]')[0].dataset.id,
            producto_id: valor_item[0],
            stock: 0
        };
        
        let y = await ajaxRequest('/sistema/carta/instanciando', data);
        alert(y);
        // if(y.out){
        //     cargarDatos();
        // }
    // });
}

    // function ajaxRequest (url, data) {
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: data,
    //         success: function (respuesta) {
    //             console.log("res= "+ JSON.stringify(respuesta));
    //             cargarDatos();
    //         }
    //     });
    // }
    function cargarDatos(){
        $.ajax({
            url: "/sistema/carta/activa",
            type: 'GET',//llama a index de CartaItem Controlador
            success: function (respuesta) {
                ga=respuesta[0].productos[0]['nombre'];
                
                var htmlproducto = "";
                    for(i=0;i<respuesta.length;i++)
                    {
                        htmlproducto += "<tr>"+
                        "<td>" + respuesta[i]['id'] + "</td>"+
                        "<td>" + respuesta[i].productos[0]['nombre'] + "</td>"+
                        "<td>" + respuesta[i].productos[0]['codigo'] + "</td>"+
                        "<td>" +respuesta[i]['stock']
                            + "</td>"+ "<td>categoria</td>"+
                        "<td><div class='listado-item-ele'><button class='btn btn-danger' onclick='eliminarFila("+ respuesta[i]['id'] +")'>X</button></div></td>"+
                    "</tr>";
                    }
                        
                
                $('#tabla-data-productos tbody').html(htmlproducto);
            }
        });
    }
    function eliminarFila(id_prod)
    {
        
        var data = {
            //id : id_prod,
            _token: $('input[name=_token]').val()
        };alert("pulsado" + id_prod);
        $.ajax({
            url: "/sistema/carta-item/delete/"+id_prod+"",
            type: 'DELETE',//llama a index de CartaItem Controlador
            data: data,
            success: function (respuesta) {
                //alert("dddd");
               console.log(respuesta);
               cargarDatos();
            }
        });
    }
    // $("#buscarprod").on("keyup", function(){
    //     console.log($(this).val());
    //     var data = {
    //         valor : $(this).val(),
    //         _token: $('input[name=_token]').val()
    //     };
    //     $.ajax({
    //         url: "/sistema/carta/buscar",
    //         type: "POST",
    //         //dataType:"json",
    //         data:data,
    //         success:function(data){
    //             console.log(data);
    //             html="";
    //             for(i=0;i<data.length;i++)
    //             {   
    //                 if(data[i]!="")
    //                 {   
    //                     html+="<tr>";
    //                         html+="<td>"+data[i]['id']+"</td>";
    //                         html+="<td>"+data[i]['codigo']+"</td>";
    //                         html+="<td>"+data[i]['nombre']+"</td>";
    //                         html+="<td>"+ parseFloat(data[i]['precio']).toFixed(2)+"</td>";
    //                         html+="<td></td>";
                            
    //                         html+="<td>";
    //                             html+="<div class='btn-group'>";
    //                                 html+="<button type='button' class='btn btn-success btn-agregarprod' value='"+data[i]['id']+"*"+data[i]['codigo']+"*"+data[i]['nombre']+"'>";
    //                                     html+="<span class='fa fa-plus'></span>";
    //                                 html+="</button>";
    //                             html+="</div>";
    //                         html+="</td></tr>";
    //                 }
                   
    //             }
    //             $('#busqueda_producto').html(html);
                
    //         }
    //     });
    // });
    