Dropzone.options.myAwesomeDropzone = {
	paramName: "imagen",
	maxFilesize : 1.5,
	accept: function(file, done) {
    	console.log("yeah",file);
  	},
  	success: function (file, response) {
        console.log(response);
        console.log(file);
    },
    error: function(x,y){
    	console.log(x,y);
    }
};
