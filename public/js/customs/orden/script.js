let orden_actual = {
    mesa : 0,
    total: 0,
    total_redondeado : 0,
    tiempo_espera_total : 0,
    detalle : []
};
$(function() {
    var hoy = new Date();
    //Año
    y = hoy.getFullYear();
    //Mes
    m = hoy.getMonth() + 1;
    //Día
    d = hoy.getDate();
        if(d<10)
            d='0'+d; //agrega cero si el menor de 10
        if(m<10)
            m='0'+m //agrega cero si el menor de 10
    //document.getElementById('fecha').value=y+"-"+m+"-"+d;
     $("#fecha").text(y+"-"+m+"-"+d);
     // console.log("fecha"+d+"/"+m+"/"+y);

});

function insertarItem(data){
    orden_actual.detalle.push({
        producto_id : data.id,
        cantidad : 1,
        subtotal : parseFloat(data.precio),
        promociones_id : null,
        comentario: data.comentario
    });
	orden_actual.total = 0;    
    orden_actual.detalle.forEach((x)=>{
    	orden_actual.total += x.subtotal;
    });
}
$('.counter').change((e)=>{
	alert("s");
});
$(".btn-agregar2").on("click",function(){
    let id_item = $(this).data('id'),nombre_item = $(this).data('nombre'),codigo_item = $(this).data('codigo'),categoria_item = $(this).data('categoria'),precio_item = $(this).data('precio'),stock = $(this).data('stock');
        if(stock>0){
            insertarItem(this.dataset);
            html = `<tr id="ele-orden-item-${id_item}">
            <td>${codigo_item}</td>
            <td>${nombre_item}</td>
            <td>${precio_item}</td>
            <td>${stock}</td>
            <td><input class="counter" type="number" min="1" max="${stock}" value="1"></td>
            <td>${precio_item}</td>
            <td><button class="btn btn-danger" onclick="eliminarProd(${id_item})"><span class="fa fa-close"></span></button></td>
            </tr>`;
        }
        $("#tbventas tbody").append(html);
});
function eliminarProd(x){
    orden_actual.detalle = orden_actual.detalle.filter(pos=> pos.producto_id!=x );
    $(`#ele-orden-item-${x}`).remove();    
}
$('#mesas').change(()=>{
	orden_actual.mesa = parseInt($('#mesas')[0].value);
});
$('#orden').submit(async (e)=>{
e.preventDefault();
let x = await ajaxRequest('/sistema/orden',orden_actual);
if(x.out){
	console.log(x.data);
}
});