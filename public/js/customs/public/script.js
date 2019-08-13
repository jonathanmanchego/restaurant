//  function add(x){
//     let result = await ajaxRequest(`/carrito/update/${x}/1`,);
//     });
//  }
//  function remove(x){
//     $.ajax({
//         url: `/carrito/remove/${x}/1`,
//         success(data){
//             if(data == 'success'){
//                 let total = $(`#total_${x}`).val();
//                 total = parseInt(total)-1;
//                 $(`#total_${x}`).val(total);

//                 let pU = parseFloat($(`#PrecioIndi_${x}`).val());
//                 let sT = parseFloat($(`#subTotal_${x}`).val());
//                 console.log(pU);
//                 $(`#subTotal_${x}`).val((sT - pU).toFixed(2));
//                 let totalCarrito = parseFloat($('#totalCarrito').text());
//                 totalCarrito += pU;
//                 $('#totalCarrito').text(totalCarrito);
//             }else if(data == 'redirect'){
//                 location.reload();
//             }
            
//         }
//     }).fail((x)=>{
//         console.log(x);
//     });
//  }
// function addItems(){
//     if(data == 'success'){
//         let total = $(`#total_${x}`).val();
//         total = parseInt(total)+1;
//         $(`#total_${x}`).val(total);

//         let pU = parseFloat($(`#PrecioIndi_${x}`).val());
//         let sT = parseFloat($(`#subTotal_${x}`).val());
//         $(`#subTotal_${x}`).val((sT + pU).toFixed(2));
//         let totalCarrito = parseFloat($('#totalCarrito').text());
//         totalCarrito += pU;
//         $('#totalCarrito').text(totalCarrito);
//     }
// }
// function removeItems(){

// }