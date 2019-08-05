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
    $(`#cartaEstado${lx}`).append("<b>ACTIVA</b>");
}