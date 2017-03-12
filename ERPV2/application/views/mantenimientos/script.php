<script type="text/javascript">
    function inicio() {
        /*
         *  Index
         */
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
        
        $(document).keypress(function(e) {
            if(e.which == 13) {
                $("#agregar").click();
            }
        });
        
        /*
         *  Agregar
         */
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
                "Se agregará el mantenimiento",
                function() {
                    datos = {
                        'fecha' : $("#fecha").val(),
                        'tipo_mantenimiento' : $("#tipo_mantenimiento").val(),
                        'maquina' : $("#maquina").val(),
                        'diagnostico' : $("#diagnostico").val(),
                        'correccion' : $("#correccion").val(),
                        'usuario' : $("#usuario").val(),
                        'tiempo_reparacion' : $("#tiempo_reparacion").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/mantenimientos/agregar_post/',
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
                                document.getElementById("fecha").value = "";
                                document.getElementById("diagnostico").value = "";
                                document.getElementById("correccion").value = "";
                                document.getElementById("tiempo_reparacion").value = "";
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
</script>