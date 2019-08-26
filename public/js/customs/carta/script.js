async function changeEstado(id){
    var data = {
        id
    };
    let result = await ajaxRequest('/sistema/carta/change-state',data);
    console.log(result);
    if(result.out){
        console.log(result);
        location.reload();
        // changeData(result,id);
    }
}
// async function ajaxRequest (url, data) {
//  data._token = $('input[name=_token]').val();
//     $.ajax({
//         url: url,
//         type: 'POST',
//         data: data,
//         success: function (ans) {
//          // console.log(ans);
//          changeData();
//         }
//     }).fail((x)=>{
//      console.log(x);
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
DATOS JS DE LARAVEL
*/

// INSTANCIANDO CARTA SCRIPTS
let productos_carta = productos_actual || [];
function insertarItem(data){
    productos_carta.push({
        carta_id : carta_actual.id,
        producto_id : data,
        stock : 0
    });
}
function add(x){
    let counter_actual = $(`#counter_${x}`).text();
    counter_actual++;
    $(`#counter_${x}`).text(counter_actual);
    productos_carta.forEach((pos,key)=> {
        if(pos.producto_id == x){
            pos.stock++;
        }    
    });
}
function remove(x){
    let counter_actual = $(`#counter_${x}`).text();
    if(counter_actual != 0){
        counter_actual--;
        $(`#counter_${x}`).text(counter_actual);
        productos_carta.forEach((pos,key)=> {
            if(pos.producto_id == x){
                pos.stock--;
            }    
        });    
    }
}
async function eliminarProd(x){
    productos_carta = productos_carta.filter(pos=> pos.producto_id!=x );
    let data = {
        producto_id : x,
        carta_id : carta_actual.id
    };
    productos_alt = productos_actual.filter(pos=> pos.producto_id!=x );
    $(`#ele-carta-item-${x}`).remove();     
    $(`#item-productos-${x}`).show();   
    let ans = await ajaxRequest('/sistema/carta/removiendo/',data);    
}
async function agregarProd(x){
    let id_item = $(x).data('id'),nombre_item = $(x).data('nombre'),codigo_item = $(x).data('codigo'),
    categoria_item = $(x).data('categoria'),precio_item = $(x).data('precio');
    insertarItem(id_item);
    let ans = `<tr id="ele-carta-item-${id_item}">
    <td>${id_item}</td>
    <td>${nombre_item}</td>
    <td>${codigo_item}</td>
    <td>
        <input type="number"  value="0" class="borde border-secondary text-center form-control-plaintext" id="counter_${id_item}" style="width:35%">
    </td>
    <td>${precio_item}</td>
    <td>${categoria_item}</td>
    <td><button class="btn btn-danger" onclick="eliminarProd(${id_item})"><span class="fa fa-close"></span></button></td>
        </tr>`;
    $('#carta_items').append(ans);
    $(`#item-productos-${id_item}`).hide();
    // $('#btn-agregarprod').click(async()=>{
        // valores = x.value;
        // valor_item = valores.split("*");
        // var data = {
        //     carta_id: $('span[data-name=activa]')[0].dataset.id,
        //     producto_id: valor_item[0],
        //     stock: 0
        // };
        //     cargarDatos();
        // let y = await ajaxRequest('/sistema/carta/instanciando', data);
        // alert(y);
        // if(y.out){
        
        // }
    // });
}
// async function guardarPedido(){
//     productos_carta.forEach(act => {
//         act.stock = $(`#counter_${act.producto_id}`)[0].value;
//     });
//     let y = await ajaxRequest('/sistema/carta/instanciando', {productos:productos_carta});
//     if(y.out){
//         location.reload();
//     }
// }
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
    