$(document).ready(function(){
    $("#select-cliente").on('change',function(){
       var _this = $(this),
       _val = _this.val()
       _url = _this.data("url");
       
       if(_val!=""){       
            $.ajax({
                url: _url,
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    var _tmpoption = "";
                    if(data.estado=="ok"&&data.contenido){
                        _tmpoption = '<option value="">Seleccione campo</option>';
                        $.each(data.contenido, function(i, obj) {
                            _tmpoption = _tmpoption + '<option value="'+obj.id+'">'+obj.nombre+'</option>';
                        });
                    }else{
                        _tmpoption = '<option value="">No se han encontrado campos</option>';
                    }
                    $("#select-campo").html(_tmpoption);
                    $("#select-potrero").html('<option value="">Seleccione potrero</option>');
                },
                data: {cli_id:_val,metodo:"getCamposCliente"}
            });
       }
    });
    $("#select-campo").on('change',function(){
       var _this = $(this),
       _val = _this.val()
       _url = _this.data("url");
       
       if(_val!=""){       
            $.ajax({
                url: _url,
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    var _tmpoption = "";
                    if(data.estado=="ok"&&data.contenido){
                        _tmpoption = '<option value="">Seleccione potrero</option>';
                        $.each(data.contenido, function(i, obj) {
                            _tmpoption = _tmpoption + '<option value="'+obj.id+'">'+obj.nombre+'</option>';
                        });
                    }else{
                        _tmpoption = '<option value="">No se han encontrado potreros</option>';
                    }
                    $("#select-potrero").html(_tmpoption);
                },
                data: {cam_id:_val,metodo:"getPotrerosCampo"}
            });
       }
    });
});