$(document).ready(function(){
	$("#input-upload").fileinput({
	    language: "es",
	    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
	});
        
        $(".eliminar-imagen").on('click',function(){
            var _this = $(this),
            _id = _this.data("id"),
            _selector = $("#imagen"+_id);
            _selector.prop("checked", !_selector.prop("checked"));
        })
})