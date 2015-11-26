$(document).ready(function(){
    if($(".fecha").length){
            $( ".fecha" ).datepicker();
            $.datepicker.regional['es']
            $( ".fecha" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
            $( ".fecha" ).datepicker('option', 'firstDay', 1);
            var _fecha = $( ".fecha" ).data("fecha");
            if(_fecha!=""){
                $(".fecha").datepicker('setDate', _fecha);
            }
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
            _id = _this.data("id"),
            _formurl = _this.data("urlform");
        console.log(_formurl);
        $("#modal-imagen-img-src").attr("src",_img);
        $("#modal-imagen-id").val(_id);
        $("#modal-form-url").attr("action",_formurl);
        
        $("#modal-imagen").modal();
    });
    
    $(".modal-cv").on('click',function(){
        var _this = $(this),
            _url = _this.data("url"),
            _id = _this.data("id");  

        $.ajax({
            url: _url,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if(data.estado=="ok"&&data.contenido){
        
                    $("#modal-cv-nombre").html(data.contenido.nombre);
                    $("#modal-cv-rut").html(data.contenido.rut);
                    $("#modal-cv-telefono").html(data.contenido.telefono);
                    $("#modal-cv-carta").html(data.contenido.carta_presentacion);
                    $("#modal-cv-archivo").attr("href",data.contenido.ruta);
                    $("#modal-cv-email").html(data.contenido.email)

                    $("#modal-cv").modal();
                    
                }
            },
            data: {cur_id:_id,metodo:"getCv"}
        });
    })
    
    $("#tipo-promocion").on('change',function(){
        var _this = $(this),
        _val = _this.val();
        switch(_val){
            case "si":
                $(".opcion-video").removeClass("hide");
                $(".opcion-imagen").addClass("hide");
                break;
            case "no":
                $(".opcion-video").addClass("hide");
                $(".opcion-imagen").removeClass("hide");
                break;
            default:
                $(".opcion-video").addClass("hide");
                $(".opcion-imagen").addClass("hide");
                break;
        }
    });
    
    if($(".editor-redactor").length){
        $(".editor-redactor").redactor({
            buttons: ['formatting', '|', 'bold', 'italic', 'deleted', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',  'link', '|', 'fontcolor', 'backcolor']
        });
    }
	
})