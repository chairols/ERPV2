<script type="text/javascript">
    function inicio() {
        
        /*
         *  Agregar
         */
        $.ajax({
            type: 'GET',
            url: '/hojasdeproceso/proximoid/',
            beforeSend: function() {
                $("#resultado").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function(data) {
                $("#resultado").html(data);
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
                "Se agregará la Hoja de Proceso "+$("#nombrehp").val(),
                function() {
                    datos = {
                        'id' : $("#id").val(),
                        'hojadeproceso' : $("#hojadeproceso").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/hojasdeproceso/agregar_post/',
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
                                document.getElementById("hojadeproceso").value = "";
                                url = "/hojasdeproceso/modificar/"+resultado['id']+"/";
                                setTimeout("redireccionar(url)", 1000);
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