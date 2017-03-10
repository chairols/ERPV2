<script type="text/javascript">
    function inicio() {
        /*
         *  Index
         */
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
        $(document).keypress(function(e) {
            if(e.which == 13) {
                $("#ok").click();
            }
        });
        
        /*
         *  Agregar
         */
        $("#ok").click(function() {
            limpiar();
            
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
            
            if($("#tipomaquina").val() != '') {
                alertify.confirm(
                        "<strong>¿Desea confirmar?</strong>", "Se agregará el tipo de máquina "+$("#tipomaquina").val(),
                    function() {
                        datos = {
                            'tipomaquina' : $("#tipomaquina").val()
                        };
                        $.ajax({
                            type: 'POST',
                            url: '/tiposmaquinas/agregar_post/',
                            data: datos,
                            beforeSend: function() {
                                //$("#contenido").html('<img src="/assets/img/ajax-loader.gif">');
                            },
                            success: function(data) {
                                if(data == 0) {
                                    alertify.success("Se agregó");
                                    $("#tipomaquina").val('');
                                } else if(data == 1) {
                                    alertify.error("El Tipo de Máquina ya existe");
                                } else if(data == 2) {
                                    alertify.error("No se pudo agregar");
                                } else if(data == 3) {
                                    $("#tipomaquinaerror").html('<div class="alert alert-danger">El campo no puede estar vacío</div>');
                                }
                            }
                        });

                    },
                    function() {
                        alertify.error("Se canceló la operación");
                    }
                );
            } else {
                alertify.defaults.glossary = {
                    ok: "OK"
                };
                $("#form-tipo-maquina").addClass('has-error');
            }
        });
        
    }
    
    function limpiar() {
        $("#form-tipo-maquina").removeClass('has-error');
        $("#tipomaquina").focus();
        
    }
</script>