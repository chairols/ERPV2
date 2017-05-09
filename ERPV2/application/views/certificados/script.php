<script type="text/javascript">
    
    function inicio() {
        /*
         *  Agregar
         */
        
        $.ajax({
            type: 'GET',
            url: '/certificados/ajax_numero/',
            beforeSend: function() {
                $("#numero_certificado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#numero_certificado").html(data);
            }
        });
        
        
        $("#agregar").click(function() {
            
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
                "Se agregará el certificado "+$("#numero").val(),
                function() {
                    datos = {
                        'numero' : $("#numero").val(),
                        'articulo' : $("#articulo").val(),
                        'numero_serie' : $("#numero_serie").val(),
                        'cliente' : $("#cliente").val(),
                        'fecha' : $("#fecha").val(),
                        'plantilla' : $("#plantilla").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/certificados/agregar_post/',
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
                                url = "/certificados/modificar/"+resultado['id']+"/";
                                setTimeout("redireccionar(url)", 3000);
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
    
    function redireccionar(url) {
        window.location = url;
    }

    
</script>