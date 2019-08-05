async function ajaxRequest (url, data) {
	data._token = $('input[name=_token]').val();
    let result = false;
    await $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success:  function (ans) {
        	// console.log(ans);
        	result = {
                out: true,
                data : ans
            };
        }
    }).fail((x)=>{
    	console.log(x);
    });
    return result;
}