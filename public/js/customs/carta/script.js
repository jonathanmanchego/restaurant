async function changeEstado(id){
	
	var data = {
        id
	};
	await ajaxRequest('/sistema/carta/change-state',data);
}
async function ajaxRequest (url, data) {
	data._token = $('input[name=_token]').val();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (ans) {
        	// console.log(ans);
        	$(`button`).remove('.btn-activate');
        	$(`#carta${ans.id}`).append(`<button class='btn btn-info btn-activate' 
        		id='carta${ans.id}' onclick='javascript:changeEstado(${ans.id})'>
						ACTIVAR
						</button>`);
        	$(`#cartaEstado${ans.id}`).empty();
        	$(`#cartaEstado${data.id}`).empty();
			$(`#cartaEstado${ans.id}`).append("INACTIVA");
			$(`#cartaEstado${data.id}`).append("<b>ACTIVA</b>")
        }
    }).fail((x)=>{
    	console.log(x);
    });
}