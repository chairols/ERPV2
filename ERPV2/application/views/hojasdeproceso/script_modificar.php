<script type="text/javascript">
    function inicio() {
    
        articulos_asociados();
        
        $("#asociar_articulo").click(function() {

            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-success";
            alertify.defaults.theme.cancel = "btn btn-danger";
            alertify.defaults.theme.input = "form-control";
            alertify.defaults.notifier = {
                delay: 3,
                position: 'bottom-right',
                closeButton: false
            };
            alertify.defaults.glossary = {
                ok: "Agregar",
                cancel: "Cancelar"
            };

            alertify.confirm(
                "<strong>¿Desea confirmar?</strong>",
                "Se asociará el artículo "+$("#articulo option:selected").text(),
                function() {
                    datos = {
                        'articulo' : $("#articulo").val(),
                        'hojadeproceso' : $("#hojadeproceso").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/hojasdeproceso/agregar_articulo_post/',
                        data: datos,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            alertify.defaults.glossary = {
                                ok: "Aceptar",
                            };
                            resultado = $.parseJSON(data);
                            if(resultado['status'] == 'error') {
                                alertify.alert('<strong>ERROR</strong>', resultado['data']);
                            } else if(resultado['status'] == 'ok') {
                                alertify.success("Se agregó correctamente");
                                articulos_asociados();
                            }
                        }
                    });
                },
                function() {
                    alertify.error("Se canceló la operación");
                }
            );

        });

    }
    
    function articulos_asociados() {
        $.ajax({
            type: 'GET',
            url: '/hojasdeproceso/articulos_asociados/'+$("#hojadeproceso").val(),
            beforeSend: function() {
                $("#hojasdeproceso_articulos").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function(data) {
                $("#hojasdeproceso_articulos").html(data);
            }
        });
    }
    
    function desasociar_articulo(idhojadeproceso, idarticulo) {
        $.ajax({
            type: 'GET',
            url: '/hojasdeproceso/desasociar_articulo/'+idhojadeproceso+'/'+idarticulo+'/',
            beforeSend: function() {
                $("#hojasdeproceso_articulos").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function() {
                articulos_asociados();
            }
        });
        
    }
</script> 