$(document).ready(function(){
    if($(".fecha").length){
            $( ".fecha" ).datepicker();
            $.datepicker.regional['es']
            $( ".fecha" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
            $( ".fecha" ).datepicker('option', 'firstDay', 1);
    }

    $('.msgbox-eliminar').on ('click', function (e) {
        var _this = $(this),
            _msg = _this.data("msg");
        $.msgbox(_msg, {
            type: "confirm",
            buttons : [
            {type: "submit", value: "Si"},
            {type: "cancel", value: "Cancelar"}
            ]
        }, function(result) {
            if(result=="Si"){
                _this.parent("form").submit();
            }
        });
    });
    
    $(".modal-imagen").on('click',function(){
        var _this = $(this),
            _img = _this.data("img"),
            _id = _this.data("id");
        
        $("#modal-imagen-img-src").attr("src",_img);
        $("#modal-imagen-id").val(_id);
        
        $("#modal-imagen").modal();
    })
	
})