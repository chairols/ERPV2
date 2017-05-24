<script type="text/javascript">
    
    function inicio() {
        
        
        /*
        *  Modificar
         */
         
         
        $("#modificar").click(function() {
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
                ok: "Modificar",
                cancel: "Cancelar"
            };
            
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            
            alertify.confirm(
                "<strong>¿Desea confirmar?</strong>",
                "Se modificará el certificado "+$("#num_certificado").val(),
                function() {
                    datos = {
                        'idcertificado' : '<?=$certificado['idcertificado']?>',
                        'articulo' : $("#articulo").val(),
                        'numero_serie' : $("#numero_serie").val(),
                        'cliente' : $("#cliente").val(),
                        'fecha' : $("#fecha").val(),
                        'certificado' : $("#certificado").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/certificados/modificar_post/',
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
                                alertify.success("Se modificó correctamente");
                            }
                        }
                    });
                },
                function() {
                    alertify.error("Se canceló la operación");
                }
            );
        });
        
        CKEDITOR.replace('certificado');
    }
    
    function redireccionar(url) {
        window.location = url;
    }

    
</script>